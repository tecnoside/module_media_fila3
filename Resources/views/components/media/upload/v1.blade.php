@include('media::components.partials.media-library-once')
:multiple="$multiple" :maxItems="$determineMaxItems()" :view="$componentView ?? null" :sortable="false"
:listView="$determineListViewName()" :itemView="$determineItemViewName()"
:propertiesView="$propertiesView ?? null" :fieldsView="$determineFieldsViewName()" :editableName="$editableName" />
