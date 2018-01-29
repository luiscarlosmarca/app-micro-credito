
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
		id:'',	
		nombre:'',
		cedula:'',
		email:'',
		celular:'',
		direccion:'',
		role:'',
		errors:[],
		fillCobrador:{
			'id':'', 
			'nombre':'',
			'cedula':'',
			'celular':'',
			'direccion':'',
			'email':'',
			carteras:[],
		
		}
	},	
	
	methods: {
		getCobrador: function() {
			var urlCobrador = 'persona/cobrador';
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
			this.fillCobrador.carteras=[$(".carteras").val()]
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
		deleteCobrador:function(id){
			var urlDelete ='persona/' + id;
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
				role:'cobrador',


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
				this.errors=error.response
			});

		},	

	}

});

const cliente = new Vue({
    el: '#cliente',
   	created: function() {
		this.getCliente();
	},
	data:{
		clientes:[],
		nombre:'',
		cedula:'',
		email:'',
		celular:'',
		role:'',
		direccion:'',
		cobrador_id:'',
		estado:'',
		errors:[],
		fillcliente:{
			'id':'', 
			'nombre':'',
			'cedula':'',
			'celular':'',
			'direccion':'',
			'email':'',
			'cobrador_id':'',
			'estado':'',

		}
	},	
	methods: {
		getCliente: function() {
			var urlcliente = '/persona/cliente';
			axios.get(urlcliente).then(response => {
				this.clientes = response.data
			});
		},
		editCliente: function(cliente) {

			this.fillcliente.id= cliente.id;
			this.fillcliente.nombre=cliente.nombre;
			this.fillcliente.cedula=cliente.cedula;
			this.fillcliente.celular=cliente.celular;
			this.fillcliente.direccion=cliente.direccion;
			this.fillcliente.email=cliente.email;
			this.fillcliente.estado=cliente.estado;
			
			$(".cobrador_id").val(cliente.cobrador_id);
			this.fillcliente.cobrador_id=cliente.cobrador_id;
			$('#edit').modal('show');
			$('#error').empty();

		},
		updateCliente:function(id) {
			this.fillcliente.cobrador_id=$(".cobrador_id").val();
			$('#edit').modal('show');
			var url = 'persona/' + id;
			axios.put(url,this.fillcliente).then(response=>{

				this.getCliente();
				fillcliente={
					'id':'', 
					'nombre':'',
					'cedula':'',
					'celular':'',
					'direccion':'',
					'email':'',
					'cobrador_id':'',
					'estado':'',

				}
			this.errors=[];
				$('#edit').modal('hide');
				toastr.success('cliente Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteCliente:function(cliente){
			var urlDelete ='persona/' + cliente.id
			axios.delete(urlDelete).then(response=>{
				this.getCliente();  
				toastr.success('Cliente eliminado correctamente');
			});
			
		},
		createCliente:function(){

			var url='persona'
			axios.post(url,{
				nombre: this.nombre,
				cedula: this.cedula,
				email:this.email,
				celular:this.celular,
				direccion:this.direccion,
				estado:this.estado,
				cobrador_id:$(".cobrador_id").val(),
				role:'cliente'

			}).then(response=>{

				this.getCliente();
				this.nombre='';
				this.cedula='';
				this.email='';
				this.celular='';
				this.direccion='';
				this.cobrador_id='';
				this.estado='';
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('cliente Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	

	}

});

const gasto = new Vue({
    el: '#gasto',
   	created: function() {
		this.getGasto();
	},
	data:{
		gastos:[],
		detalle:'',
		valor:'',
		errors:[],
		fillgasto:{
			'detalle':'',
			'valor':'',
			'id':''
		}
	},	
	methods: {
		getGasto: function() {
			var url = 'gasto';
			axios.get(url).then(response => {
				this.gastos = response.data
			});
		},
		editGasto: function(gasto) {

	
			this.fillgasto.detalle=gasto.detalle;
			this.fillgasto.valor=gasto.valor;
			this.fillgasto.id=gasto.id;
			
			$('#edit').modal('show');
			$('#error').empty();

		},
		updateGasto:function(id) {
			var url = 'gasto/' + id;
			axios.put(url,this.fillgasto).then(response=>{

				this.getGasto();
				fillgasto={
					'id':'',
					'valor':'',
					'detalle':'',
					

				}
			this.errors=[];
				$('#edit').modal('hide');
				toastr.success('cliente Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteGasto:function(gasto){
			var urlDelete ='gasto/' + gasto.id
			axios.delete(urlDelete).then(response=>{
				this.getGasto();  
				toastr.success('Gasto eliminado eliminado correctamente');
			});
			
		},
		createGasto:function(){

			var url='gasto'
			axios.post(url,{
				valor: this.valor,
				detalle: this.detalle,
				

			}).then(response=>{

				this.getGasto();
				this.valor='';
				this.detalle='';
			
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('Gasto Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	

	}

});