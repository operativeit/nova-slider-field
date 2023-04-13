<template>
  <DefaultField
    :field="currentField"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <vue-slider ref="slider" v-model="value"
                  class="w-full mt-2"
                  :class="errorClasses"
                  :id="currentField.attribute"
                  :min="currentField.min || 0"
                  :max="currentField.max || 100"
                  :interval="currentField.step || 1"
                  :tooltip="currentField.tooltip || 'always'"
                  :formatter="currentField.formatter || null">
      </vue-slider>
    </template>
  </DefaultField>
</template>

<script>
import { HandlesValidationErrors, DependentFormField } from 'laravel-nova'
import vueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

export default {
  mixins: [HandlesValidationErrors, DependentFormField],

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
