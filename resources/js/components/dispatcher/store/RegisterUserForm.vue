<template>
	<form>
		<h4>Información de cliente</h4>
		<hr>
		<div class="form-group">
	  		<label>Documento</label>
			<input class="form-control" type="text" v-model="documento" required>
		</div>
		<div class="form-group">
			<label>Nombre y apellido</label>
			 <input class="form-control" type="text" v-model="username" required>
		</div>
		<div class="form-group">
			<label>Teléfono</label>
			 <input class="form-control" type="text" v-model="phoneNumber" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			 <input class="form-control" type="mail" v-model="email" required>
		</div>
		<div class="form-group">
			<label>Contraseña</label>
			 <input class="form-control" type="password" v-model="password">
		</div>
		<div class="col row justify-content-end">
		    <button type="button" class="btn btn-primary m-1" @click="validarCampos()">Siguiente</button>
		</div>
	</form>
</template>
<script>
	import Swal from 'sweetalert2';
	export default{
		props: [],
		components:{

		},
		data(){
			return{
				documento: '',
				username: '',
				phoneNumber: '',
				email: '',
				password: '',
			}
		},
		created(){
			
		},
		methods:{
			enviarDatos(){
				const datos = {
					documento: this.documento,
					username: this.username,
					phoneNumber: this.phoneNumber,
					email: this.email,
					password: this.password
				};

				this.$parent.saveUserInformation(datos);
			},
			validarCampos(){
				if(!this.documento || !this.username || !this.phoneNumber || !this.email || !this.password){
					Swal.fire({
						icon: 'error',
						title: 'Campos vacios',
						text: 'Todos los campos deben ser validados',
					});
					return false
				}else{
					this.enviarDatos();
					return true
				}
				

			}
		}
	}
</script>

