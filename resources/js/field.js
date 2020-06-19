Nova.booting((Vue, router, store) => {
  Vue.component('index-InlineIndex', require('./components/IndexField'))
  Vue.component('detail-InlineIndex', require('./components/DetailField'))
  Vue.component('form-InlineIndex', require('./components/FormField'))
})
