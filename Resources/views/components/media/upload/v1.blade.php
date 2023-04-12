@include('media::components.partials.media-library-once')
<<<<<<< HEAD
<livewire:media.index
    :key="'media-library-component' . $name"
    :media="$media"
    :name="$name"
    :rules="$rules"
    :multiple="$multiple"
    :maxItems="$determineMaxItems()"
    :view="$componentView ?? null"
    :sortable="false"
    :listView="$determineListViewName()"
    :itemView="$determineItemViewName()"
    :propertiesView="$propertiesView ?? null"
    :fieldsView="$determineFieldsViewName()"
    :editableName="$editableName"
/>
=======
<livewire:media.index :key="'media-library-component' . $name" :media="$media" :name="$name" :rules="$rules" :multiple="$multiple"
    :maxItems="$determineMaxItems()" :view="$componentView ?? null" :sortable="false" :listView="$determineListViewName()" :itemView="$determineItemViewName()" :propertiesView="$propertiesView ?? null"
    :fieldsView="$determineFieldsViewName()" :editableName="$editableName" />
>>>>>>> a573407 (up)
