var app = new Vue({
  el: '#invoice',
  data: {
    form: {},
    errors: {}
  },
  created: function() {
    Vue.set(this.$date, 'form', _form);
  }
})