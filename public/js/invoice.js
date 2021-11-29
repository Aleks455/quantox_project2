// var app = new Vue({
//   el: '#invoice',
//   data: {
//     form: {},
//     errors: {}
//   },
//   created: function() {
//     Vue.set(this.$date, 'form', _form);
//   }

  
// })
// Vue.http.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';

//               window._form = {
//                   // status = '',
//                   // date = '',
//                   // due_date = '',
//                   // client_id = '',
//                   // items = [{
//                     //   name = '',
//                       // qty = 1,
//                       // price = 0,
//                   // }]
//               }
console.log("Hello World");

const app = Vue.createApp({

  template: '<h1>I am the template</h1>'
})

app.mount('#invoice')