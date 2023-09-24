<template>
	<div id="modalStoreOrder" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h4 class="modal-title fs-5" id="exampleModalLabel">PRODUCTOS DE LA ORDEN</h4>
	        		<button type="button" class="btn btn-outline-secondary p-1 px-2" @click="$parent.closeOrderModal()"><i class="fa fa-times" aria-hidden="true"></i> </button>
	      		</div>
	      	<div class="modal-body">
	        
	      		<div class="col-12 m-0 p-0">
	      			<table class="table table-bordered">
	      				<thead>
	      					<tr>
	      						<th>NOMBRE</th>
	      						<th>CANTIDAD</th>
	      						<th>SUBTOTAL</th>
	      					</tr>
	      				</thead>
	      				<tbody>
	      					<tr v-for="item in order_item">
	      						<td>{{ item.product.product_name }}</td>
	      						<td>{{ item.quantity }}</td>
	      						<td>{{ formatCurrency(item.quantity * item.product.price) }}</td>
	      					</tr>
	      				</tbody>
	      			</table>
	      		</div>

	      	</div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" @click="$parent.closeOrderModal()">CERRAR</button>
		      	</div>
	    	</div>
	  	</div>
	</div>
</template>
<script>
	export default{
		props: [ 'order_product' ],
		components:{

		},
		data(){
			return{
				order_item: [],
			}
		},
		created(){
			this.order_item = this.order_product
		},
		methods:{
			formatCurrency(amount) {
				// Formatear el número como moneda en pesos colombianos
				return amount.toLocaleString("es-CO", {
														style: "currency",
														currency: "COP",
													  });
			},
		}
	}
</script>