import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-slide-field', IndexField)
  app.component('detail-nova-slide-field', DetailField)
  app.component('form-nova-slide-field', FormField)
})
