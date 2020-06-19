<template>
  <div>
    <input
      :id="fieldId"
      :type="fieldtType"
      class="w-full form-control form-input form-input-bordered"
      :class="errorClasses"
      :placeholder="field.name"
      v-model="value"
      v-on="listener"
    />
  </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';
export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resourceName', 'field'],
  methods: {
    submit() {
      return Nova.request()
        .post(
          `/inline-index/update/${this.resourceName}`,
          {
          	id: this.resourceId,
            attribute: this.field.attribute,
            value: this.value
          }
        )
        .then(
          () => {
            this.$toasted.show(`${this.field.name} updated`, {
              type: 'success',
            });
            this.refreshTable();
          },
          (response) => this.$toasted.show(response, { type: 'error' })
        );
    },
    refreshTable() {
      if (this.shouldRefresh) {
        this.$parent.$parent.$parent.$parent.$parent.$parent.getResources();
      }
    },
    capitalize(string) {
      return string.charAt(0).toUpperCase() + string.substr(1);
    },
  },
  computed: {
    resourceId() {
      return this.$parent.resource.id.value;
    },
    fieldId() {
      return `inline-text-field-${this.field.name}-${this.resourceId}`;
    },
    fieldtType() {
      return this.field.type == undefined ? 'text':this.field.type;
    },
    shouldRefresh() {
      return this.field.refreshOnSaving;
    },
    listener() {
      var eventPara = this.field.event == undefined ? 'keyup.enter':this.field.event;
      const event = eventPara.split('.');
      const name = event[0];
      const modifier = event[1] ? this.capitalize(event[1]) : null;
      return {
        [name]: (e) => {
          if (this.valueWasNotChanged) return;
          if (modifier && modifier === e.key) this.submit();
          if (!modifier) this.submit();
        },
      };
    },
    valueWasNotChanged() {
      return this.value === this.field.value;
    },
  },
};
</script>
