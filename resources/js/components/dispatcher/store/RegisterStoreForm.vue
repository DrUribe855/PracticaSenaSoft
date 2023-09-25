<template>
	<form>
		<h4>Información de tienda</h4>
		<hr>
		<div class="form-group">
	  		<label>Nombre</label>
			<input class="form-control" type="text" v-model="storeName" required>
		</div>
		<div class="form-group">
			<label>Direccion</label>
			 <input class="form-control" type="text" v-model="address" required>
		</div>
		<div class="col row justify-content-end">
		    <button type="button" class="btn btn-primary m-1" @click="ejecutarAcciones()" >Siguiente</button>
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
				storeName: '',
				address: '',
			}
		},
		created(){
			
		},
		methods:{
			enviarDatos(){
				const datos = {
					storeName: this.storeName,
					address: this.address
				};

				this.$parent.saveStoreInformation(datos);
			},
			validarCampos(){
				if(!this.storeName || !this.address){
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
				

			},
			ejecutarAcciones(){
			this.enviarDatos();
			$parent.closeRegisterModal();

		}
		}
		

	}
</script>