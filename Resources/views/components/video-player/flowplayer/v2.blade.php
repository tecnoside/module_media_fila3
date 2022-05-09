<div id="div_contenitore_video" style="position: relative;">


    <div id="myElement" class="is-splash no-toggle fp-outlined"></div>

    <script type="text/javascript">
        cedatPlayer.init
            .hls(
                "//stream.mediamonitor.it/piuvoce/_definst_/Nazionali/LA7/2022/01/22/Nazionali-LA7-20220122-150501-153501.mp4/playlist.m3u8"
            )
            .html5("//html5.magnetofono.it/piuvoce/Nazionali/LA7/2022/01/22/Nazionali-LA7-20220122-150501-153501.mp4")
            .ratio(9 / 16);
    </script>
    <div id="tooltip_cuepoint"></div>
</div>


@push('scripts')
    <script>
        var cedatPlayer = {
            container: "#myElement",
            cuepointIdentifier: "a.fp-cuepoint",
            audioCoverImage: "media/img/radio.jpg",
            liveCoverImage: "media/img/video.png",


            api: undefined,
            subtitles: [],
            isAudio: false,
            isLive: false,





            /**
             * inizialize player parameters first, then call cedatPlayer.run object
             */
            init: init = {
                hlsStream: undefined,
                html5Stream: undefined,
                rtmpHead: undefined,
                rtmpTail: undefined,
                hlsLiveStream: undefined,

                classDebug: false,
                flowplayerDebug: false,
                //TODO: cambiare

                containerRatio: 0,



                /**
                 * set HLS streaming url
                 * @param {string} url
                 * @returns cedatPlayer.init obj
                 */
                hls: function(url) {
                    this.hlsStream = url;
                    return this;
                },

                /**
                 * set HTML5 streaming url
                 * @param {string} url
                 * @returns cedatPlayer.init obj
                 */
                html5: function(url) {
                    this.html5Stream = url;
                    return this;
                },

                /**
                 * set FLASH streaming url
                 * @param {string} url
                 * @returns cedatPlayer.init obj
                 */
                flash: function(head, tail) {
                    this.rtmpHead = head;
                    this.rtmpTail = tail;
                    return this;
                },

                /**
                 * set HLS LIVE streaming url
                 * @param {string} url
                 * @returns cedatPlayer.init obj
                 */
                hlsLive: function(url) {
                    this.hlsLiveStream = url;
                    cedatPlayer.isLive = true;
                    return this;
                },

                /**
                 * set subtitles url
                 * @param {string} url 			subtitle url
                 * @param {string} srclang 		[def. "it"]
                 * @param {string} label 		[def. "Italiano"]
                 * @param {boolean} defSub 		if it shows as default subtitle
                 * @returns cedatPlayer.init obj
                 */
                subtitles: function(url, srclang, label, defSub) {
                    var subtitle = {
                        "default": true,
                        kind: "subtitles",
                        srclang: "it",
                        label: "Italiano",
                        src: ""
                    };
                    if (cedatPlayer.subtitles.length > 0) {
                        subtitle['default'] = false;
                    }

                    if (typeof url == "undefined") {
                        cedatPlayer.log("ERROR: BAD Subtitle URL!!!");
                        return this;
                    }
                    if (typeof srclang != "undefined") {
                        subtitle.srclang = srclang;
                    }
                    if (typeof label != "undefined") {
                        subtitle.label = label;
                    }
                    if (typeof defSub != "undefined") {
                        subtitle['default'] = defSub;
                    }
                    subtitle.src = url;
                    cedatPlayer.subtitles.push(subtitle);


                    return this;
                },

                /**
                 * set true if streaming has no video
                 * @param {boolean} value
                 * @returns cedatPlayer.init obj
                 */
                isAudio: function(value) {
                    cedatPlayer.isAudio = value;
                    return this;
                },

                /**
                 * set player aspect ratio
                 * set 0 to get the player's ratio adapts vertically to the video's aspect ratio
                 *
                 * @param {number} value		values: 0, 9/16, 3/4, 5/12 [def. 0]
                 * @returns cedatPlayer.init obj
                 */
                ratio: function(value) {
                    this.containerRatio = value;
                    return this;
                },

                /**
                 * Activate script debug
                 * @returns cedatPlayer.init obj
                 */
                debug: function() {
                    this.classDebug = true;
                    return this;
                },

                /**
                 * Activate player debug
                 * @returns cedatPlayer.init obj
                 */
                playerDebug: function() {
                    this.flowplayerDebug = true;
                    return this;
                },
            },


            /**
             * classe per gestire il LIVE streaming
             */
            incrementalPublication: incrementalPublication = {
                chekingContents: false,
                status: undefined,
                docName: undefined,
                refreshTime: undefined,
                last_starttime_sentences: null,
                last_end_sentences: null,


                /**
                 * gestione streaming terminato
                 */
                streamingDone: function() {
                    cedatPlayer.log("streamingDone fired");
                    if (cedatPlayer.incrementalPublication.status != "done") {
                        cedatPlayer.incrementalPublication.status = "done";
                        $(".flowplayer .info").fadeOut();
                        $(".flowplayer .info").promise().done(function() {
                            $(".flowplayer .live-done").fadeIn(400, function() {
                                $(this)
                                    .css({
                                        "cursor": "pointer"
                                    })
                                    .click(function() {
                                        $(this).fadeOut();
                                        $(".video-big-right-2 .live .blink").hide();
                                    });
                            });
                        });
                        cedatPlayer.incrementalPublication.stopCheckingForNewContents();
                    }
                },


                /**
                 * inizializza il processo che verifica la presenza di nuovi contenuti da pubblicare sulla pagina web
                 */
                checkForNewContents: function() {
                    this.chekingContents = window.setInterval(function() {
                        cedatPlayer.log("chekingContents fired");
                        if (this.chekingContents !== false && cedatPlayer.api.ready && (cedatPlayer.api
                                .playing || cedatPlayer.api.paused)) {
                            cedatPlayer.incrementalPublication
                                .updateStreamingStatusAndXmlRevised()
                                .always(
                                    cedatPlayer.scaletta.getNewScalettaContents()
                                );
                        }

                    }, cedatPlayer.incrementalPublication.refreshTime);
                    cedatPlayer.log("chekingContents setInterval val: " + this.chekingContents);
                },


                /**
                 * arresta il processo che verifica la presenza di nuovi contenuti da pubblicare sulla pagina we
                 */
                stopCheckingForNewContents: function() {
                    cedatPlayer.log("stopCheckingForNewContents fired");
                    window.clearInterval(this.chekingContents);
                    this.chekingContents = false;
                },


                /**
                 * gestione streaming in pausa
                 */
                streamingPaused: function() {
                    cedatPlayer.log("streamingPaused fired");
                    if (cedatPlayer.incrementalPublication.status != "paused") {
                        cedatPlayer.incrementalPublication.status = "paused";
                        $(".flowplayer .info").fadeOut();
                        $(".flowplayer .info").promise().done(function() {
                            $(".flowplayer .live-paused").fadeIn(400, function() {
                                $(this)
                                    .css({
                                        "cursor": "pointer"
                                    })
                                    .click(function() {
                                        $(this).fadeOut();
                                    });
                            });
                        });
                    }
                },


                /**
                 * gestione streaming in corso
                 */
                streamingIsGoing: function() {
                    cedatPlayer.log("streamingIsGoing fired");
                    if (cedatPlayer.incrementalPublication.status != "going") {
                        cedatPlayer.incrementalPublication.status = "going";
                        if ($(".flowplayer .live-paused").is(":visible")) {
                            $(".flowplayer .info").fadeOut();
                            $(".flowplayer .info").promise().done(function() {
                                $(".flowplayer .live-going").fadeIn(400, function() {
                                    $(this)
                                        .css({
                                            "cursor": "pointer"
                                        })
                                        .click(function() {
                                            $(this).fadeOut();
                                        });
                                });
                            });
                        }
                    }
                },


                /**
                 * updates streaming status and the revised text in the fulltext area
                 * @returns Deferred Object
                 */
                updateStreamingStatusAndXmlRevised: function() {
                    var posting = $.post("getInfoService.php", {
                        action: "incrementalPublication",
                        docName: cedatPlayer.incrementalPublication.docName,
                        last_starttime_sentences: cedatPlayer.incrementalPublication
                            .last_starttime_sentences,
                        last_end_sentences: cedatPlayer.incrementalPublication.last_end_sentences,
                        versionDoc: cedatPlayer.startUp.versionDoc,
                        xmlRevised: cedatPlayer.startUp.xmlRevised

                    });
                    posting.done(function(response) {
                        response = $.trim(response);
                        var parsedResponse = $.parseJSON(response);

                        cedatPlayer.log("chekingContents response: " + parsedResponse);

                        if (parsedResponse.msg == "done") {
                            cedatPlayer.incrementalPublication.streamingDone();

                        } else if (parsedResponse.msg == "paused") {
                            cedatPlayer.incrementalPublication.streamingPaused();

                        } else {
                            cedatPlayer.incrementalPublication.streamingIsGoing();
                        }

                        if (cedatPlayer.startUp.xmlRevised && parsedResponse.Annotatedvalue != "" &&
                            (parseInt(parsedResponse.last_starttime_sentences) > 0 || parsedResponse
                                .last_starttime_sentences != null)) {

                            var first_starttime_sentences = parsedResponse.first_starttime_sentences;

                            $("#fulltext .starttime_" + first_starttime_sentences).nextAll('p, div')
                                .remove();
                            $("#fulltext .starttime_" + first_starttime_sentences).remove();

                            $("#fulltext").append(parsedResponse.Annotatedvalue);

                            cedatPlayer.log("Aggiornamento contentuto live revisionata");

                            cedatPlayer.incrementalPublication.last_starttime_sentences = parsedResponse
                                .last_starttime_sentences;
                            cedatPlayer.incrementalPublication.last_end_sentences = parsedResponse
                                .last_end_sentences;
                            cedatPlayer.startUp.versionDoc = parsedResponse.versionDoc;

                            //$("#fulltext").animate({scrollTop: $('#fulltext')[0].scrollHeight}, 350);
                            cedatPlayer.startUp.mouseInOutManager();

                            cedatPlayer.api.disableSubtitles().loadSubtitles(0);
                        }
                    });
                    return posting;
                },
            },


            /**
             * main method
             * NB: call cedatPlayer.init object before calling this
             */
            run: function() {
                try {
                    if (typeof cedatPlayer.init.hlsStream == "undefined" &&
                        typeof cedatPlayer.init.html5Stream == "undefined" &&
                        typeof cedatPlayer.init.rtmpHead == "undefined" &&
                        typeof cedatPlayer.init.hlsLiveStream == "undefined") {
                        throw "No streaming URL defined";
                    }

                    var playerConf = this.getPlayerConfig();
                    $(this.container).flowplayer(playerConf);

                    this.api = flowplayer();
                    this.setPlayerEvents();

                    this.startUp.run();

                    $("#loading").hide();

                } catch (e) {
                    alert("Player ERROR: " + e);
                    throw e;
                }
            },


            /**
             * console.debug instance
             * @returns cedatPlayer obj
             */
            log: function() {
                if (cedatPlayer.init.classDebug) {
                    console.log.apply(console, arguments);
                }
                return this;
            },


            /**
             * get player configuration object
             * @returns json obj
             */
            getPlayerConfig: function() {
                var clip = {
                    sources: [],
                    live: false,
                    hlsjs: false,
                    //title: "video title",
                    subtitles: this.subtitles,
                };

                if (cedatPlayer.isLive == false) {

                    if (typeof cedatPlayer.init.rtmpTail != "undefined" && typeof cedatPlayer.init.rtmpHead !=
                        "undefined") {
                        clip.sources.push({
                            type: "video/flash",
                            src: cedatPlayer.init.rtmpTail
                        });
                        clip.rtmp = cedatPlayer.init.rtmpHead;
                    }
                    if (typeof cedatPlayer.init.hlsStream != "undefined") {
                        clip.sources.push({
                            type: "application/x-mpegurl",
                            src: cedatPlayer.init.hlsStream
                        });
                        clip.hlsjs = true;
                    }
                    if (typeof cedatPlayer.init.html5Stream != "undefined") {
                        clip.sources.push({
                            type: "video/mp4",
                            src: cedatPlayer.init.html5Stream
                        });
                    }

                } else {

                    if (typeof cedatPlayer.init.hlsLiveStream != "undefined") {
                        clip.sources.push({
                            type: "application/x-mpegurl",
                            src: cedatPlayer.init.hlsLiveStream
                        });
                        clip.hlsjs = true;
                    }
                }

                var player = {
                    adaptiveRatio: false,
                    autoplay: false,
                    clip: clip,
                    debug: cedatPlayer.init.flowplayerDebug,
                    disabled: false,
                    fullscreen: true,
                    keyboard: true,
                    live: false,
                    swf: "media/js/flowplayer-7.0.4/flowplayer.swf",
                    swfHls: "media/js/flowplayer-7.0.4/flowplayerhls.swf",
                    tooltip: false,
                    embed: false,
                    generate_cuepoints: true,
                    cuepoints: [],
                    share: false,
                };
                if (cedatPlayer.init.containerRatio == 0) {
                    player.adaptiveRatio = true;
                } else {
                    player.ratio = cedatPlayer.init.containerRatio;
                }

                //audio settings
                if (this.isAudio) {
                    clip.audio = true;
                    clip.coverImage = this.audioCoverImage;
                    player.splash = this.audioCoverImage;
                }

                //live settings
                if (cedatPlayer.isLive == true) {
                    if (cedatPlayer.startUp.xmlRevised == false) {
                        player.splash = this.liveCoverImage;
                    }
                    clip.dvr = true;
                }

                // hlsjs debug settings
                if (clip.hlsjs == true) {
                    clip.hlsjs = {
                        debug: cedatPlayer.init.flowplayerDebug
                    };
                }

                return player;
            },


            /**
             * used to execute custom JavaScript when a specified event happens in the player
             */
            setPlayerEvents: function() {

                // ON events
                this.api.on("ready", function(e, api) {
                    //cedatPlayer.log("onReady args: ", arguments);


                }).on("cuepoint", function(e, api, cuepoint) {
                    cedatPlayer.log("cuepoint args:", arguments);


                }).on("progress", function(e, api, currentTime) {
                    //cedatPlayer.log("progress args:", arguments);

                    var currentTimeInt = Math.floor(currentTime);

                    // highlight nel testo della trascrizione
                    cedatPlayer.transcription.highlightSubtitle(currentTimeInt);

                    // chiamata scroll scaletta
                    if (currentTimeInt == cedatPlayer.scaletta.nextTimeEntry) {
                        cedatPlayer.scaletta.scalettaScrollTo(cedatPlayer.scaletta.nextTimeEntry);
                    }

                    // se si clicca sulla scaletta, viene settato l'istante in cui mettere in pausa il Player
                    if (typeof cedatPlayer.helpers.timeToPause != "undefined" && (currentTime * 1000) >=
                        cedatPlayer.helpers.timeToPause) {
                        api.pause();
                        cedatPlayer.helpers.timeToPause = undefined;
                    }


                }).on("seek", function(e, api, currentTime) {

                    var currentTimeInt = Math.floor(currentTime);

                    // highlight nel testo della trascrizione
                    cedatPlayer.transcription.highlightSubtitle(currentTimeInt);

                    // chiamata scroll scaletta
                    cedatPlayer.scaletta.scalettaScrollTo(currentTime);

                    if (typeof cedatPlayer.helpers.startPlayerFromScaletta != "undefined") {
                        // reset start scaletta se un seek arriva dalla scaletta
                        cedatPlayer.helpers.startPlayerFromScaletta = undefined;
                    } else {
                        // reset pausa scaletta se un seek non arriva dalla scaletta
                        cedatPlayer.helpers.timeToPause = undefined;
                    }


                }).on("error", function(e, api, err) {
                    //				console.log("error args:", arguments);
                    //TODO
                    //				if (err.code === 4) {
                    //					timer = setTimeout(function () {
                    //						api.error = api.loading = false;
                    //						api.load();
                    //					}, 500);
                    //				}
                    //				if (err.code === 4) {
                    //					$(".fp-ui .fp-message", cedatPlayer.container).remove();
                    //					api.error = api.loading = api.playing = false;
                    //					cedatPlayer.setPlayerEvents();
                    //					cedatPlayer.api = api;
                    //				}
                });


                // ONCE events
                this.api.one("progress", function() {
                    cedatPlayer.log("ONCE progress args:", arguments);

                    //hack to not show background spash image on player PAUSE
                    $(cedatPlayer.container).css("background-image", "none");



                }).one("ready", function(e, api) {
                    cedatPlayer.log("ONCE ready args:", arguments);

                    //hack to show cover image on flash engine marking clip as audio clip
                    if (cedatPlayer.isAudio) {
                        var fp_engine = $(".fp-engine", cedatPlayer.container);
                        if (fp_engine.is("object")) {
                            fp_engine.css("height", "1px").css("width", "1px");
                        }
                    }


                    // carico i marker appena metto in play
                    cedatPlayer.timeLine.addMarkersToTimeLine();

                    // gestione seek allo start del Player
                    cedatPlayer.helpers.seekToStartTime();


                    // aggiornamento pagina web in LIVE
                    if (cedatPlayer.isLive) {
                        cedatPlayer.incrementalPublication.updateStreamingStatusAndXmlRevised()
                            .always(
                                cedatPlayer.incrementalPublication.checkForNewContents()
                            );
                        if (cedatPlayer.startUp.xmlRevised) {
                            $(".fp-duration", cedatPlayer.container).html('On-Air');
                        }

                        // hlsjs on events
                        //TODO
                        api.engine.hlsjs.on("hlsError", function(event, data) {
                                //						console.log("hlsjs args:", arguments);
                                //						if (data.fatal == true && data.type == "networkError" && data.details == "manifestParsingError" && data.reason == "no EXTM3U delimiter") {
                                //							console.log("hlsjs empty manifest fired");
                                //
                                //							cedatPlayer.api.load();

                                //							cedatPlayer.api.error = cedatPlayer.api.loading = false;
                                //							cedatPlayer.api.load();
                                //							cedatPlayer.api.error = cedatPlayer.api.loading = false;

                                //							var playerConf = cedatPlayer.getPlayerConfig();
                                //							$(cedatPlayer.container).flowplayer(playerConf);

                                //							cedatPlayer.api = flowplayer();
                                //							cedatPlayer.setPlayerEvents();
                                //
                                //							cedatPlayer.api.load();
                                //						}
                            })
                            .on("hlsDestroying", function(event, data) {
                                //						console.log("hlsjs args:", arguments);
                            })
                            .on("hlsMediaDetaching", function(event, data) {
                                //						console.log("hlsjs args:", arguments);
                            })
                            .on("hlsMediaDetached", function(event, data) {
                                //						console.log("hlsjs args:", arguments);
                            });
                    }
                });
            },


            /**
             * helper class to store application logic methods
             */
            helpers: helpers = {
                startPlayerFromScaletta: undefined,
                timeToPause: undefined,



                /**
                 * chiamato on click dalla scaletta
                 *
                 * @param int play: tempo in secondi
                 * @param int pause: tempo in millisecondi
                 * @param string className
                 *
                 * @return false
                 */
                setMetaTiming: function(play, pause, className) {
                    cedatPlayer.helpers.timeToPause = undefined;
                    cedatPlayer.helpers.startPlayerFromScaletta = play;

                    if (!cedatPlayer.api.ready) {
                        // vedi cedatPlayer.helpers.seekToStartTime();
                        cedatPlayer.api.load();

                    } else {
                        cedatPlayer.api.seek(play);
                    }

                    if (cedatPlayer.api.paused) {
                        cedatPlayer.api.play();
                    }

                    if (typeof pause != "undefined" && pause > 0) {
                        cedatPlayer.helpers.timeToPause = pause;
                    }

                    cedatPlayer.log("setMetaTiming: play, pause -->", play, pause);

                    return false;
                },


                /**
                 * gestione seek del video allo start del Player;
                 * fa il seek del video a seconda che sia dato un time, o sulla prima occorrenza di una ricerca
                 */
                seekToStartTime: function() {
                    var startTime = 0;
                    if (typeof cedatPlayer.helpers.startPlayerFromScaletta != "undefined") {
                        startTime = cedatPlayer.helpers.startPlayerFromScaletta;
                        cedatPlayer.helpers.startPlayerFromScaletta = undefined;

                    } else if ($("#startTime").val() !== "" && $("#startTime").val() != 0) {
                        startTime = parseInt($("#startTime").val());

                    } else if (cedatPlayer.timeLine.markersTimeTag.length > 0) {
                        startTime = cedatPlayer.timeLine.seekToNextMarker();

                    } else {
                        var firstSection = $('#fulltext strong:first').parent();
                        if (firstSection.size() > 0) {
                            startTime = cedatPlayer.helpers.getSecondBySection(firstSection);
                        }
                    }

                    if (startTime > 0) {
                        cedatPlayer.api.seek(startTime);
                    } else if (cedatPlayer.isLive == true && cedatPlayer.startUp.xmlRevised == true) {
                        cedatPlayer.api.seek(0);
                    }
                },


                /**
                 * Restituisce il numero integer di secondi legati alla sezione (span) nel testo della trascrizione
                 * @param section
                 * @returns
                 */
                getSecondBySection: function(section) {
                    return parseInt(section.attr("class").replace(/([^0-9])/gi, ""));
                },


                showScaletta: function() {
                    $("#loading").show();

                    //TODO trovare un class che non sia gia' bindato (overthrow gia' attiva un plugin javascript)
                    $('.overthrow').hide();
                    $("#scaletta").show();
                    $("#loading").hide();

                    if (!cedatPlayer.api.ready) {
                        cedatPlayer.api.load();
                    }

                    // highlight nel testo della trascrizione
                    cedatPlayer.transcription.highlightSubtitle(cedatPlayer.api.video.time);
                    // chiamata scroll scaletta
                    cedatPlayer.scaletta.scalettaScrollTo(cedatPlayer.api.video.time);
                },


                showTrascrizione: function() {
                    $("#loading").show();

                    $('.overthrow').hide();
                    $("#fulltext").show();
                    $("#loading").hide();

                    if (!cedatPlayer.api.ready) {
                        cedatPlayer.api.load();
                    }

                    var currentTimeInt = Math.floor(cedatPlayer.api.video.time);
                    // highlight nel testo della trascrizione
                    cedatPlayer.transcription.highlightSubtitle(currentTimeInt);
                    // chiamata scroll scaletta
                    cedatPlayer.scaletta.scalettaScrollTo(currentTimeInt);
                },
            },


            /**
             * startUp class to store method to cast at player startup
             */
            startUp: startUp = {
                namedEntities: null,
                noScroll: false,
                userAgent: undefined,
                versionDoc: null,
                xmlRevised: false,


                run: function() {
                    // inizializzazione scaletta
                    if (typeof cedatPlayer.scaletta.xmlname != 'undefined') {
                        //cedatPlayer.scaletta.getNewScalettaContents();
                    }
                    this
                        .transcriptionAreaManager()
                        .markerDivsManager()
                        .namedEntitiesManager()
                        .mouseInOutManager();
                },


                /**
                 * gestione della textarea contenente la trascrizione
                 * @returns cedatPlayer.startUp obj instance
                 */
                transcriptionAreaManager: function() {
                    $("#fulltext").show();
                    $("#editcut").show();
                    //cedatPlayer.api.load();
                    $("#fulltext").on("click", ".segment", function(event) {
                        var section = $(event.target);
                        //named entity click bugfix
                        while (!section.hasClass("segment")) {
                            section = section.parent();
                        }
                        var time = cedatPlayer.helpers.getSecondBySection(section);
                        cedatPlayer.api.seek(time);
                        cedatPlayer.transcription.highlightSubtitle(time);
                        event.stopPropagation();
                    });

                    return this;
                },


                /**
                 * gestione del click dei div per mettere sulla timeline fulltext, odg e speaker ricercati
                 * @returns cedatPlayer.startUp obj instance
                 */
                markerDivsManager: function() {
                    var tooltip_manager = $("#tooltip_manager");
                    $(".tooltip_manager_element_box", tooltip_manager).click(function() {
                        $(".tooltip_manager_element_box", tooltip_manager).removeClass(
                            "tooltip_manager_element_selected").addClass("tooltip_manager_element");
                        $(".tooltip_manager_list_speaker div:first", tooltip_manager).removeClass(
                                "tooltip_manager_list_speaker_img_selected")
                            .addClass("tooltip_manager_list_speaker_img");
                        $(this).removeClass("tooltip_manager_element").addClass(
                            "tooltip_manager_element_selected");
                        if ($(this).attr("data-elem") == "speakers") {
                            $(".tooltip_manager_list_speaker div:first", tooltip_manager).removeClass(
                                    "tooltip_manager_list_speaker_img")
                                .addClass("tooltip_manager_list_speaker_img_selected");
                        }

                        cedatPlayer.timeLine.addMarkersToTimeLine();


                        if (!cedatPlayer.api.ready) {
                            cedatPlayer.api.load();
                        }
                    });


                    $(".tooltip_manager_list_speaker div:first", tooltip_manager).click(function() {
                        $(".tooltip_manager_list_speaker_list", tooltip_manager).toggle();
                    });

                    return this;
                },


                /**
                 * gestione delle named entities nella textarea della trascrizione
                 * @returns cedatPlayer.startUp obj
                 */
                namedEntitiesManager: function() {
                    if (!(cedatPlayer.isLive && cedatPlayer.startUp.xmlRevised == false)) {

                        // estendo jQuery con il filtro icontains che verifica che la parola sia insensitive
                        jQuery.expr[':'].icontains = function(a, i, m) {
                            return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
                        };

                        this.namedEntities = $(
                            '#fulltext .location, #fulltext .people, #fulltext .organization');
                        $("#fulltext").on("click", ".location, .people, .organization", function(event) {
                            event.preventDefault();
                            event.stopPropagation();

                            $("#tooltip_manager .tooltip_manager_element_box").removeClass(
                                "tooltip_manager_element_selected").addClass(
                                "tooltip_manager_element");

                            cedatPlayer.timeLine.spottedNamedEntities.removeClass("spotted");

                            var currentClickedObject = $(event.target);
                            var wordToSpot = currentClickedObject.text();

                            cedatPlayer.timeLine.spottedNamedEntities = cedatPlayer.startUp
                                .namedEntities.filter(":icontains(" + wordToSpot + ")").addClass(
                                    "spotted");

                            cedatPlayer.timeLine.unsetMarkers();
                            cedatPlayer.timeLine.addNamedEntitiesToTimeLine();
                        });
                    }

                    return this;
                },


                mouseInOutManager: function() {
                    var selector = $("#fulltext, #scaletta");
                    selector.mouseenter(function(event) {
                        if (cedatPlayer.startUp.userAgent == "PC") {
                            cedatPlayer.startUp.noScroll = true;
                        }
                    });

                    selector.mouseleave(function(event) {
                        if (cedatPlayer.startUp.userAgent == "PC") {
                            cedatPlayer.startUp.noScroll = false;
                        }
                    });

                    return this;
                },
            },


            transcription: transcription = {
                highlighted: null,



                /**
                 * Evidenza il testo nella trascrizione
                 *
                 * @param second
                 */
                highlightSubtitle: function(second) {
                    var selettore_area_testo = "";
                    var selettore_area_testo_span = "";
                    if ($("#fulltext").is(":visible")) {
                        selettore_area_testo = "fulltext";
                        selettore_area_testo_span = "fulltext p span";
                    } else if ($("#fullcut").is(":visible")) {
                        selettore_area_testo = "fullcut";
                        selettore_area_testo_span = "fullcut span";
                    }

                    if ($("#" + selettore_area_testo).is(":visible")) {

                        if ($("#" + selettore_area_testo_span).size() == 0) {
                            return;
                        }

                        if (this.highlighted !== null) {
                            this.highlighted.removeClass("highlight");
                        }

                        // scroll to element
                        var selectors = $("#" + selettore_area_testo_span + ".sec" + second);
                        if (selectors.size() >= 1) {
                            this.highlighted = selectors.addClass("highlight");
                            if (!cedatPlayer.startUp.noScroll) {
                                var parent = this.highlighted.parent().parent().stop();
                                /*if( selettore_area_testo == "fullcut" ){ // cambio i riferimenti se siamo nella pagina di ritaglio
                                    var parent = this.highlighted.parent().stop();
                                }*/
                                var fullOffset = (this.highlighted.offset().top + parent.scrollTop()) - parent
                                    .offset().top;
                                parent.animate({
                                    scrollTop: fullOffset - 100
                                }, 350);
                            }

                            return;
                        }

                        // scroll to top
                        var firstTime = cedatPlayer.helpers.getSecondBySection($("#" +
                            selettore_area_testo_span + ":first"));
                        if (second < firstTime) {
                            if (!cedatPlayer.startUp.noScroll) {
                                $("#fulltext").animate({
                                    scrollTop: 0
                                }, 350);
                            }
                            return;
                        }

                        // scroll to bottom
                        var lastTime = cedatPlayer.helpers.getSecondBySection($("#" +
                            selettore_area_testo_span + ":last"));
                        if (second > lastTime) {
                            if (!cedatPlayer.startUp.noScroll) {
                                $("#" + selettore_area_testo).animate({
                                    scrollTop: $('#' + selettore_area_testo)[0].scrollHeight
                                }, 350);
                            }
                            return;
                        }
                    }
                },
            },


            timeLine: timeLine = {
                spottedNamedEntities: $([]),
                spkJSon: undefined,
                odgJson: undefined,
                markersTimeTag: [],



                /**
                 * Aggiunge alla timeline i marker relativi alla ricerca fulltext
                 */
                addKeywordsToTimeLine: function() {
                    $('#fulltext .segment strong').each(function() {
                        var elm = $(this).closest(".segment");
                        var time = cedatPlayer.helpers.getSecondBySection(elm);

                        var prevElms = elm.prevAll(":not(:empty):lt(4)");
                        var nextElms = elm.nextAll(":not(:empty):lt(4)");
                        var text = "";
                        var isStart = false;
                        var isEnd = false;

                        if (prevElms.size() <= 2) {
                            isStart = true;
                            nextElms = nextElms.filter(":lt(" + (4 - prevElms.size()) + ")");
                        } else if (nextElms <= 2) {
                            isEnd = true;
                            prevElms = prevElms.filter(":lt(" + (4 - nextElms.size()) + ")");
                        } else {
                            prevElms = prevElms.filter(":lt(2)");
                            nextElms = nextElms.filter(":lt(2)");
                        }

                        prevElms.each(function() {
                            text = $(this).html() + " " + text;
                        });
                        text += elm.html();
                        nextElms.each(function() {
                            text += " " + $(this).html();
                        });

                        if (isStart) {
                            text = text.charAt(0).toUpperCase() + text.substr(1);
                        } else {
                            text = "&hellip;" + text;
                        }
                        if (!isEnd) {
                            text += "&hellip;";
                        }

                        cedatPlayer.timeLine.setMarker(time, text);
                        cedatPlayer.timeLine.markersTimeTag[cedatPlayer.timeLine.markersTimeTag
                            .length] = time;
                    });
                },



                addKeywordsToTimeLine_Elastic: function() {
                    $('#div_highlights .segment_highlight').each(function() {
                        cedatPlayer.timeLine.setMarker($(this).attr("data-time"), $(this).html());
                        cedatPlayer.timeLine.markersTimeTag[cedatPlayer.timeLine.markersTimeTag
                            .length] = $(this).attr("data-time");
                    });
                },


                /**
                 * Aggiunge alla timeline i marker relativi alla ricerca degli speaker
                 */
                addSpeakersToTimeLine: function() {
                    if (typeof cedatPlayer.timeLine.spkJSon != 'undefined') {
                        cedatPlayer.timeLine.markersTimeTag = [];
                        $.each(cedatPlayer.timeLine.spkJSon, function() {
                            $.each(this, function(i, val) {
                                var time = val,
                                    text = i;

                                cedatPlayer.timeLine.setMarker(time, text);
                                cedatPlayer.timeLine.markersTimeTag[cedatPlayer.timeLine
                                    .markersTimeTag.length] = time;
                            });
                        });
                    }
                },


                /**
                 * Aggiunge alla timeline i marker relativi alla ricerca dell'odg
                 */
                addOdgsToTimeLine: function() {
                    if (typeof cedatPlayer.timeLine.odgJson != 'undefined') {
                        $.each(cedatPlayer.timeLine.odgJson, function() {
                            $.each(this, function(i, val) {
                                var time = val,
                                    text = i;

                                cedatPlayer.timeLine.setMarker(time, text);
                                cedatPlayer.timeLine.markersTimeTag[cedatPlayer.timeLine
                                    .markersTimeTag.length] = time;
                            });
                        });
                    }
                },


                /**
                 * Aggiunge alla timeline i marker relativi al named entity cliccato nel testo della trascrizione
                 */
                addNamedEntitiesToTimeLine: function() {
                    this.spottedNamedEntities.each(function() {
                        var elm = $(this);
                        var segment = elm.parents(".segment");
                        var time = cedatPlayer.helpers.getSecondBySection(segment);
                        var text = elm.text();
                        var className = "namedEnt";
                        if (elm.hasClass("people")) {
                            className += " people";
                        } else if (elm.hasClass("location")) {
                            className += " location";
                        } else if (elm.hasClass("organization")) {
                            className += " organization";
                        }
                        cedatPlayer.timeLine.setMarker(time, text);
                    });
                },


                /**
                 * restituisce il time del successivo marker nella timeline in base al current time nella timeline
                 * @returns time in seconds(?) || false
                 */
                seekToNextMarker: function() {
                    var keywordsCount = cedatPlayer.timeLine.markersTimeTag.length;
                    var i = 0;
                    while (i < keywordsCount && cedatPlayer.timeLine.markersTimeTag[i] < cedatPlayer.api.video
                        .time + 1) {
                        i++;
                    }

                    time = false;
                    if (i < keywordsCount) {
                        time = cedatPlayer.timeLine.markersTimeTag[i];
                    } else if (keywordsCount > 0) {
                        time = cedatPlayer.timeLine.markersTimeTag[0];
                    }

                    return time;
                },


                /**
                 * setta un marker nella timeline
                 */
                setMarker: function(time, text) {
                    cuepoint = {
                        "time": time,
                        "type": "marker",
                        cuetext: text
                    };
                    cedatPlayer.api.addCuepoint(cuepoint);
                    $(cedatPlayer.cuepointIdentifier + (cedatPlayer.api.cuepoints.length - 1), cedatPlayer
                            .container)
                        .mouseover(function() {
                            $("#tooltip_cuepoint").html(text).show();
                        })
                        .mouseout(function() {
                            $("#tooltip_cuepoint").html("").hide();
                        });
                },


                /**
                 * Visualizza sulla timeline il set di marker relativo a: query, odg oppure speakers
                 */
                addMarkersToTimeLine: function() {
                    if ($("#tooltip_manager .tooltip_manager_element_selected").attr("data-elem") == "query") {
                        cedatPlayer.timeLine.unsetMarkers();
                        //cedatPlayer.timeLine.addKeywordsToTimeLine();
                        cedatPlayer.timeLine.addKeywordsToTimeLine_Elastic();
                    } else if ($("#tooltip_manager .tooltip_manager_element_selected").attr("data-elem") ==
                        "odg") {
                        cedatPlayer.timeLine.unsetMarkers();
                        cedatPlayer.timeLine.addOdgsToTimeLine();
                    } else if ($("#tooltip_manager .tooltip_manager_element_selected").attr("data-elem") ==
                        "speakers") {
                        cedatPlayer.timeLine.unsetMarkers();
                        cedatPlayer.timeLine.addSpeakersToTimeLine();
                    }

                    cedatPlayer.timeLine.markersTimeTag.sort(function(a, b) {
                        return a - b;
                    });
                },


                /**
                 * Elimina tutti i cuepoint di tipo marker dall'array cedatPlayer.api.cuepoint
                 */
                unsetMarkers: function() {
                    cedatPlayer.log("markers unset");
                    if (typeof cedatPlayer.api.cuepoints != "undefined") {
                        cedatPlayer.api.setCuepoints($.map(cedatPlayer.api.cuepoints, function(value, key) {
                            if (value.type == "marker") {
                                $(cedatPlayer.cuepointIdentifier + key, cedatPlayer.container)
                                    .remove();
                                return;
                            }
                            return value;
                        }));
                    }
                },
            },


            scaletta: scaletta = {
                xmlname: undefined,
                versionFrom: 0,
                timeEntriesJSon: undefined,
                nextTimeEntry: undefined,



                /**
                 * Produce lo scroll della scaletta e l'highlight della voce nella scaletta in funzione del time del video
                 * @param time
                 */
                scalettaScrollTo: function(time) {
                    cedatPlayer.log("scalettaScrollTo called on time " + time);
                    var scaletta = $("#scaletta");
                    if (typeof cedatPlayer.scaletta.timeEntriesJSon != 'undefined' && scaletta.length > 0 &&
                        scaletta.is(":visible")) {

                        timeEntryKey = $.inArray(time, cedatPlayer.scaletta.timeEntriesJSon);
                        if (timeEntryKey === -1) {
                            $.each(cedatPlayer.scaletta.timeEntriesJSon, function(key, value) {
                                if (time >= value) {
                                    timeEntryKey = key;
                                    time = value;
                                    return false;
                                }
                            });
                        }

                        if (timeEntryKey === -1) {
                            cedatPlayer.scaletta.nextTimeEntry = cedatPlayer.scaletta.timeEntriesJSon[
                                cedatPlayer.scaletta.timeEntriesJSon.length - 1];

                            scaletta.animate({
                                scrollTop: 0
                            }, 350, function() {
                                $("li[style*='background-color']", scaletta).css("background-color",
                                "");
                            });

                        } else {

                            nextTimeEntryKey = (timeEntryKey > 0) ? timeEntryKey - 1 : timeEntryKey;
                            cedatPlayer.scaletta.nextTimeEntry = cedatPlayer.scaletta.timeEntriesJSon[
                                nextTimeEntryKey];

                            //cedatPlayer.log( "DEBUG - Bullet_ time: " + time + ", timeEntryKey: " + timeEntryKey );
                            var elem = $("[id$='Bullet_" + time + "']", scaletta);
                            //$( "#scaletta [id$='Bullet_13265']" )

                            // highlight
                            $("li[style*='background-color']", scaletta).css("background-color", "");
                            elem.css("background-color", "#c5c5c5").css("border-radius",
                            "5px"); //.corner("3px");

                            // scroll
                            if (!cedatPlayer.startUp.noScroll) {
                                var scrollTop = (elem.offset().top + scaletta.scrollTop()) - scaletta.offset()
                                    .top;
                                scaletta.animate({
                                    scrollTop: scrollTop
                                }, 350);
                            }
                        }
                        cedatPlayer.log("nextTimeEntry: " + cedatPlayer.scaletta.nextTimeEntry);
                    }
                },


                /**
                 * Recupera il contenuto della scaletta
                 * @returns Deferred Object
                 */
                getNewScalettaContents: function() {
                    var posting = $.post("getInfoService.php", {
                        action: "getUpdateScaletta",
                        xmlDocumentName: cedatPlayer.scaletta.xmlname,
                        versionFrom: cedatPlayer.scaletta.versionFrom
                    });
                    posting.done(function(response) {
                        response = $.trim(response);
                        if (response == "no new values") {
                            cedatPlayer.log("getNewScalettaContents response: " + response);
                        } else {
                            cedatPlayer.scaletta.setNewScalettaContents(response);
                        }
                    });
                    return posting;
                },


                /**
                 * aggiorna l'HTML della scaletta sulla pagina web
                 * @param contents
                 */
                setNewScalettaContents: function(contents) {
                    var parsedContents = $.parseJSON(contents);
                    //cedatPlayer.log( "setNewScalettaContents: " + parsedContents.html );
                    var scalettaDiv = $("#scaletta");
                    if (scalettaDiv.is(":hidden") && !cedatPlayer.startUp.xmlRevised) {
                        scalettaDiv.show();
                    }
                    scalettaDiv.html(parsedContents.html);
                    cedatPlayer.scaletta.versionFrom = parsedContents.scalettaVersionFrom;
                    cedatPlayer.scaletta.timeEntriesJSon = parsedContents.scalettaTimeEntriesJSon;
                    cedatPlayer.scaletta.scalettaScrollTo(cedatPlayer.api.video.time);
                },
            },
        };



        $(function() {
            // inizializza il processo al caricamento della pagina
            cedatPlayer.run();


            //flowplayer
            $('#myElement a[href="https://flowplayer.org/hello"]').wrap("<div style='display:none'></div>");
            //$('div#myElement .fp-context-menu.fp-menu').wrap( "<div style='display:none'></div>" );

        });
    </script>


    <script type="text/javascript">
        cedatPlayer.startUp.userAgent = "PC";


        var inizio;
        var fine;
        var flv;
        var primo_stop = 0;
        var qset;


        if (parseInt($("#startTime").val()) >= 0 && parseInt($("#endTime").val()) > 0) {
            inizio = parseInt($("#startTime").val());
            fine = parseInt($("#endTime").val());
            for (var i = inizio; i <= fine; i++) {
                $('#fullcut span.sec' + i).css({
                    'background-color': 'yellow'
                });
            }
        }

        function resetcut() {
            if (fine == undefined) fine = inizio;
            for (var i = inizio; i <= fine; i++) {
                $('#fullcut span.sec' + i).css({
                    'background-color': 'white'
                });
            }
            inizio = undefined;
            fine = undefined;
        }

        function setq(valore) {
            qset = valore;
        }

        function sendcut(flv, date, qkey, id, time, uri, db) {
            if (qset) {
                qkey = qset;
            }
            if (typeof fine == 'undefined') {
                alert("Attenzione, selezionare un intervallo di interesse");
                return false;
            }
            $.post("taglia.php", {
                    start: inizio,
                    end: fine,
                    video: flv,
                    data: date,
                    q: qkey,
                    id: id,
                    time: time,
                    uri: uri,
                    db: db
                },
                function(data) {
                    if (data) {

                        function mycallbackfunc(e, v, m, f) {
                            if (v) {
                                resetcut();
                            } else {
                                location.href = 'editor.php';
                            }
                        }

                        cedatPlayer.api.pause();
                        //alert(data);
                        if (data == 1) {
                            $.prompt('Selezione inserita nella pagina di Editor.', {
                                submit: mycallbackfunc,
                                buttons: {
                                    "Effettua un'altra Selezione": true,
                                    "Vai all'editor": false
                                }
                            });
                        }

                        if (data == 2) {
                            $.prompt('Attenzione! Selezione presente nella pagina di Editor.', {
                                submit: mycallbackfunc,
                                buttons: {
                                    "Effettua un'altra Selezione": true,
                                    "Vai all'editor": false
                                }
                            });
                        }

                        if (data == 3) {
                            $.prompt('Selezione modificata correttamente.', {
                                submit: mycallbackfunc,
                                buttons: {
                                    "Torna all'editor": false
                                }
                            });
                        }

                        if (data == 4) {
                            $.prompt('Attenzione! L\'intervallo supera il massimo di secondi consentito.', {
                                submit: mycallbackfunc,
                                buttons: {
                                    "Effettua un'altra Selezione": true
                                }
                            });
                        }

                        if (data == 5) {
                            $.prompt('Attenzione! Seleziona l\'intervallo di tuo interesse.', {
                                submit: mycallbackfunc,
                                buttons: {
                                    "Ok": true
                                }
                            });
                        }

                    }
                });
        }


        $(document).ready(function() {




            var fullcut = $("#fullcut");

            var resizefullcut = function() {
                //adapt full text height
                var height = $(window).height() - fullcut.offset().top - $('#Footer').outerHeight(true) - 2;
                if (height < 200) {
                    height = 200;
                } else {
                    height = 300;
                }
                fullcut.height(height);
            };

            $(window).resize(resizefullcut);
            resizefullcut();

            fullcut.mouseenter(function(event) {
                cedatPlayer.startUp.noScroll = true;
            });

            fullcut.mouseleave(function(event) {
                cedatPlayer.startUp.noScroll = false;
            });

            $('#fullcut .segment').each(function() {
                /* funzione cut */
                $(this).click(function(event) { //dblclick
                    var section = $(event.target);

                    /*verificare con 1.9.0*/
                    while (!section.hasClass("segment")) {
                        section = section.parent();
                    }
                    //event.stopPropagation();
                    var time = cedatPlayer.helpers.getSecondBySection(section);
                    if (inizio == undefined) {
                        inizio = time;
                        $(this).css({
                            'background-color': 'yellow'
                        });
                    } else if (fine == undefined && inizio >= 0 && time > inizio) {
                        fine = time;
                        $(this).css({
                            'background-color': 'yellow'
                        });
                        //exaplayer.player.toggle();
                        for (var i = inizio + 1; i < fine; i++) {
                            $('#fullcut span.sec' + i).css({
                                'background-color': 'yellow'
                            });
                        }
                    }
                });
            });

        });
    </script>
    <br />
    <br />
    </div>
    </div>
    </div>
    <div id="bottom">
        +voce &egrave; un prodotto <strong>Cedat 85</strong> - &copy; 2022 Cedat 85 Srl. Tutti i diritti riservati. </div>
    <script type="text/javascript" src="media/js/apogee.js"></script>
    <script type="text/javascript">
        var options = {};

        function slideleft(div, img) {
            if (div == 'hits') {
                $("#img-" + div).animate({
                    marginTop: '-1px'
                }, 300, function() {
                    $('#' + div).hide('blind', options, 200, function() {
                        $("#img-" + div).animate({
                            marginLeft: '750px'
                        }, 500, function() {
                            $("#img-" + div).attr({
                                'src': 'media/img/frecce/' + img + '-piu.png'
                            }).
                            parent().attr('href', "javascript:slideright(\'" + div + "\', \'" +
                                img + "\');");
                        });
                    });
                });
            } else if (div == 'tags') {
                $('#' + div).hide('blind', options, 200, function() {
                    $("#img-" + div).animate({
                        marginLeft: '750px'
                    }, 500, function() {
                        $("#img-" + div).attr({
                            'src': 'media/img/frecce/' + img + '-piu.png'
                        }).
                        parent().attr('href', "javascript:slideright(\'" + div + "\', \'" + img + "\');");
                    });
                });
            } else if (div == 'flashTimeline') {
                $('#' + div).hide('fast', function() {
                    $("#img-" + div).animate({
                        marginLeft: '750px'
                    }, 500, function() {
                        $("#img-" + div).attr({
                            'src': 'media/img/frecce/' + img + '-piu.png'
                        }).
                        parent().attr('href', "javascript:slideright(\'" + div + "\', \'" + img + "\');");
                        $('#Report').hide();
                    });
                });
            } else if (div == 'pref') {
                $("#img-" + div).animate({
                    marginTop: '-1px'
                }, 300, function() {
                    $('#' + div).hide('blind', options, 200, function() {
                        $("#img-" + div).animate({
                            marginLeft: '750px'
                        }, 500, function() {
                            $("#img-" + div).attr({
                                'src': 'media/img/frecce/' + img + '-piu.png'
                            }).
                            parent().attr('href', "javascript:slideright(\'" + div + "\', \'" +
                                img + "\');");
                        });
                    });
                });
            }
        }

        function slideright(div, img) {
            if (div == 'hits') {
                $("#img-" + div).animate({
                    marginLeft: '-26px'
                }, 500, function() {
                    $("#img-" + div).attr({
                        'src': 'media/img/frecce/' + img + '-meno.png'
                    });
                    $('#' + div).show('blind', options, 200, function() {
                        $("#img-" + div).animate({
                            marginTop: '30px'
                        }, 300, function() {
                            $("#img-" + div).parent().attr('href', "javascript:slideleft(\'" + div +
                                "\', \'" + img + "\');");
                        });
                    });
                });
            } else if (div == 'tags') {
                $("#img-" + div).animate({
                    marginLeft: '-26px'
                }, 500, function() {
                    $("#img-" + div).attr({
                        'src': 'media/img/frecce/' + img + '-meno.png'
                    });
                    $('#' + div).show('blind', options, 200, function() {
                        $("#img-" + div).parent().attr('href', "javascript:slideleft(\'" + div + "\', \'" +
                            img + "\');");
                    });
                });
            } else if (div == 'flashTimeline') {
                $("#img-" + div).animate({
                    marginLeft: '-26px'
                }, 500, function() {
                    $("#img-" + div).attr({
                        'src': 'media/img/frecce/' + img + '-meno.png'
                    });
                    $('#' + div).show('fast', function() {
                        $("#img-" + div).parent().attr('href', "javascript:slideleft(\'" + div + "\', \'" +
                            img + "\');");
                        $('#Report').show();
                    });
                });
            } else if (div == 'pref') {
                $("#img-" + div).animate({
                    marginLeft: '-26px'
                }, 500, function() {
                    $("#img-" + div).attr({
                        'src': 'media/img/frecce/' + img + '-meno.png'
                    });
                    $('#' + div).show('blind', options, 200, function() {
                        $("#img-" + div).animate({
                            marginTop: '30px'
                        }, 300, function() {
                            $("#img-" + div).parent().attr('href', "javascript:slideleft(\'" + div +
                                "\', \'" + img + "\');");
                        });
                    });
                });
            }
        }
    </script>
    <script type="text/javascript" src="media/js/flowplayer-7.0.4/flowplayer.min.js"></script>
    <script type="text/javascript" src="media/js/flowplayer-7.0.4/flowplayer.hlsjs.min.js"></script>

@endpush
