
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const cartera = new Vue({
    el: '#cartera',
   	created: function() {
		this.getCartera();
	},
	data:{
		carteras:[],
		newCartera:'',
		errors:[],
		fillCartera:{
			'id':'', 
			'nombre':''
		}
	},	
	
	methods: {
		getCartera: function() {
			var urlCartera = 'cartera';
			axios.get(urlCartera).then(response => {
				this.carteras = response.data
				
			});
		},
		editCartera: function(cartera) {

			this.fillCartera.id= cartera.id;
			this.fillCartera.nombre=cartera.nombre;
			$('#edit').modal('show');

		},
		UpdateCartera:function(id) {
			var url = 'cartera/' + id;
			axios.put(url,this.fillCartera).then(response=>{

				this.getCartera();
				this.fillCartera={'id':'', 'nombre':''};
				this.errors=[];
				$('#edit').modal('hide');
				toastr.success('Cartera Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteCartera:function(cartera){
			var urlDelete ='cartera/' + cartera.id
			axios.delete(urlDelete).then(response=>{
				this.getCartera();  
				toastr.success('Eliminado correctamente');
			});
			
		},
		createCartera:function(){

			var urlCreateCartera='cartera'
			axios.post(urlCreateCartera,{

				nombre: this.newCartera

			}).then(response=>{

				this.getCartera();
				this.newCartera='';
				this.errors=[]; 
				$('#create').modal('hide');
				toastr.success('Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	
	}

});

const cobrador = new Vue({
    el: '#cobrador',
   	created: function() {
		this.getCobrador();
	},
	data:{
		cobradores:[],
			
		nombre:'',
		cedula:'',
		email:'',
		celular:'',
		direccion:'',
		errors:[],
		fillCobrador:{
			'id':'', 
			'nombre':'',
			'cedula':'',
			'celular':'',
			'direccion':'',
			'email':'',

		}
	},	
	
	methods: {
		getCobrador: function() {
			var urlCobrador = '/persona/cobrador';
			axios.get(urlCobrador).then(response => {
				this.cobradores = response.data
				
			});
		},
		editCobrador: function(cobrador) {

			this.fillCobrador.id= cobrador.id;
			this.fillCobrador.nombre=cobrador.nombre;
			this.fillCobrador.cedula=cobrador.cedula;
			this.fillCobrador.celular=cobrador.celular;
			this.fillCobrador.direccion=cobrador.direccion;
			this.fillCobrador.email=cobrador.email;

			$('#edit').modal('show');
			$('#error').empty();

		},
		UpdateCobrador:function(id) {
			var url = 'persona/' + id;
			axios.put(url,this.fillCobrador).then(response=>{

				this.getCobrador();
				this.fillCobrador={'id':'', 'nombre':''};
				this.errors=[];
				$('#edit').modal('hide');
				toastr.success('cobrador Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteCobrador:function(cobrador){
			var urlDelete ='persona/' + cobrador.id
			axios.delete(urlDelete).then(response=>{
				this.getCobrador();  
				toastr.success('Cobrador eliminado correctamente');
			});
			
		},
		createCobrador:function(){

			var url='persona'
			axios.post(url,{

				nombre: this.nombre,
				cedula: this.cedula,
				email:this.email,
				celular:this.celular,
				direccion:this.direccion,
				role:'cobrador'

			}).then(response=>{

				this.getCobrador();
				this.nombre='';
				this.cedula='';
				this.email='';
				this.celular='';
				this.direccion='';
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('Cobrador Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	

	}

});