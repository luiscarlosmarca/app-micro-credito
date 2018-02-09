
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
//Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

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
var interes;
var cuota;
const prestamo = new Vue({
    el: '#prestamos',
   	created: function() {
		this.getPrestamo();
	},
	data:{
		prestamos:[],
		articulo:'',
		valor:'',
		cartera_id:'',
		cobrador_id:'',
		cliente_id:'',
		estado:'',
		valor:'',
		valor_seguro:'',
		valor_cuota:'',
		plazo:'',
		pago_domingos:'',
		

		errors:[],
		fillprestamo:{
			'articulo':'',
			'valor':'',
			'cartera_id':'',
			'cobrador_id':'',
			'cliente_id':'',
			'estado':'',
			'valor':'',
			'valor_seguro':'',
			'valor_cuota':'',
			'plazo':'',
			'pago_domingos':'',
			'id':''
		}
	},	
	methods: {
		getPrestamo: function() {
			var url = 'prestamo';
			axios.get(url).then(response => {
				this.prestamos = response.data
			});
		},
		editPrestamo: function(prestamo) {
	
			this.fillprestamo.articulo=prestamo.articulo;
			this.fillprestamo.valor=prestamo.valor;
			this.fillprestamo.estado=prestamo.estado;
			this.fillprestamo.valor_cuota=prestamo.valor_cuota;
			this.fillprestamo.valor_seguro=prestamo.valor_seguro;
			this.fillprestamo.plazo=prestamo.plazo;
			this.fillprestamo.pago_domingos=prestamo.pago_domingos;
			this.fillprestamo.cartera_id=prestamo.cartera_id;
			this.fillprestamo.cliente_id=prestamo.cliente_id;
			this.fillprestamo.cobrador_id=prestamo.cobrador_id;
			this.fillprestamo.id=prestamo.id;
			
			$('#edit').modal('show');
			$('#error').empty();

		},
		updatePrestamo:function(id) {
			var url = 'prestamo/' + id;
			axios.put(url,this.fillprestamo).then(response=>{

				this.getPrestamo();
				fillprestamo={
					'articulo':'',
					'valor':'',
					'cartera_id':'',
					'cobrador_id':'',
					'cliente_id':'',
					'estado':'',
					'valor':'',
					'valor_seguro':'',
					'valor_cuota':'',
					'plazo':'',
					'pago_domingos':'',	
					
				};
			this.errors=[];
				$('#edit').modal('hide');
				toastr.success('Prestamo Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		 },
		deletePrestamo:function(prestamo){
			var urlDelete ='prestamo/' + prestamo.id
			axios.delete(urlDelete).then(response=>{
				this.getPrestamo();  
				toastr.success('Prestamo eliminado eliminado correctamente');
			});
			
		},
		createPrestamo:function(){

			var url='prestamo'

			axios.post(url,{
				valor: this.valor,
				articulo: this.articulo,
				valor_cuota: this.valor_cuota,
				valor_seguro: this.valor_seguro,
				plazo: this.plazo,
				estado: this.estado,
				cliente_id: $(".cliente_id").val(),
				cartera_id: $(".cartera_id").val(),
				cobrador_id: $(".cobrador_id").val(),
				pago_domingos: this.pago_domingos,
				

				

			}).then(response=>{

				this.getPrestamo();
				this.valor='';
				this.articulo='',
				this.valor_cuota='',
				this.valor_seguro='',
				this.plazo='',
				this.estado='',
				this.cliente_id='',
				this.clarteraid='',
				this.cobrador_id='',
				this.pago_domingos='',
				this.saldo='',
			
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('Prestamo Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	
		calcularInteres:function(){

			interes=((this.valor*20)/100);
			interes= parseInt(interes) +  parseInt(this.valor);
			this.valor= interes;
		},
		calcularCuota:function(){

			cuota=interes/this.plazo;
			this.pago_domingos= cuota*4;
			this.valor_cuota=cuota;
		}	
	}

});

const cobro = new Vue({
    el: '#cobros',
   	created: function() {
		this.getPrestamo();
	},
	data:{
		prestamos:[],
		prestamo_id:'',
		valor:'',
		errors:[],
		fillprestamos:{
			'detalle':'',
			'valor':'',
			'id':''
		}
	},	
	methods: {
		getPrestamo: function() {
			var url = 'cobro';
			axios.get(url).then(response => {
				this.prestamos = response.data
			});
		},
		editPrestamo: function(prestamo) {

	
			this.fillprestamos.detalle=prestamos.detalle;
			this.fillprestamos.valor=prestamos.valor;
			this.fillprestamos.id=prestamos.id;
			
			$('#edit').modal('show');
			$('#error').empty();

		},
		updatePrestamo:function(id) {
			var url = 'prestamo/' + id;
			axios.put(url,this.fillgasto).then(response=>{

				this.getPrestamo();
				fillprestamos={
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
		deletePrestamo:function(prestamo){
			var urlDelete ='prestamo/' + prestamo.id
			axios.delete(urlDelete).then(response=>{
				this.getPrestamo();  
				toastr.success('Prestamo eliminado eliminado correctamente');
			});
			
		},
		PagarCuota:function(prestamo){

			var url='cobro'
			var valor="#"+prestamo;
			valor_cuota=$(valor).val();
			axios.post(url,{
				valor: valor_cuota,
				prestamo_id: prestamo,
				

			}).then(response=>{

				//this.getPrestamo();
				this.valor='';
				this.prestamo_id='';
			
				this.errors=[]; 
				
				$('#error').empty();
				toastr.success('Cobro  Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},
		test:function(){
			alert("debd");
		}		

	}

});