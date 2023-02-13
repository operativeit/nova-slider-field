<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <vue-slider ref="slider" v-model="value"
                  class="w-full mt-2"
                  :class="errorClasses"
                  :id="field.attribute"
                  :min="field.min || 0"
                  :max="field.max || 100"
                  :interval="field.step || 1"
                  :tooltip="field.tooltip || 'always'"
                  :formatter="field.formatter || null">

      </vue-slider>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import vueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  components: {
    vueSlider,
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || this.field.initial
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || this.field.initial)
    },
  },
}
</script>
