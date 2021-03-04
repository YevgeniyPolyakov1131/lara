/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('add-image', require('./components/addImage.vue').default);
Vue.component('list-add-images', require('./components/listAddImages.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
});



// Add the following code if you want the name of the file appear on select
$(".form_ajouter_modifier").on("change", function(evt) {
    
      if($(evt.target).attr('class')=='custom-file-input'){  
    
        var fileName = $(evt.target).val().split("\\").pop(); 
        $(evt.target).siblings(".custom-file-label").addClass("selected").html(fileName);
        let imgCourant = $(evt.target).parent().children('div').children('img');
    
        if(evt.target.files && evt.target.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                imgCourant.attr('src', e.target.result);
            };
    
            reader.readAsDataURL(evt.target.files[0]);
        }    
        
    }
      
    
});
    
