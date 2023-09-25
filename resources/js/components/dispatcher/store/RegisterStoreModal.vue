<template>
	<div class="modal fade" id="registerStoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title fs-5" id="exampleModalLabel">Registro de tienda</h3>
	        <button type="button" class="btn btn-outline-success p-1 px-2" data-bs-dismiss="modal" aria-label="Close" @click="$parent.closeRegisterModal()"><i class="fa fa-times" aria-hidden="true"></i></button>
	      </div>
		      <div class="modal-body">
		        	<register-user v-if="visibilityForm"></register-user>
		        	<register-store v-if="!visibilityForm"></register-store>
		      </div>
		      <div class="modal-footer">
		        
		      </div>
	    </div>
	  </div>
	</div>
</template>
<script>
	import registerUserForm from './RegisterUserForm';
	import registerStoreForm from './RegisterStoreForm';


	export default{
		props: [],
		components:{
			'register-user': registerUserForm,
			'register-store': registerStoreForm,
		},
		data(){
			return {
				// Si es true carga el formulario de usuario, si es false carga el de la tienda
				visibilityForm: true,
				documento: '',
				username: '',
				phoneNumber: '',
				email: '',
				password: '',
				storeName: '',
				address: '',
			}
		},
		created(){
			
		},
		methods: {
			saveUserInformation(datos){
				//Informacion usuario
				console.log(datos);
				this.documento = datos.documento;
				this.username = datos.username;
				this.phoneNumber = datos.phoneNumber;
				this.email = datos.email;
				this.password = datos.password;
				this.visibilityForm = false;
				// console.log(documento);
				// axios.post('Store/store', {documento,username,phoneNumber,email,password}).then(res => {
				// 	console.log('Respuesta del servidor');
				// 	console.log(res.data);
				// });
			},
			saveStoreInformation(datos){
				console.log(datos);
			}
		}
			
	}
</script>