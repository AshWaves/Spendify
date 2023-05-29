<template>
	<table class="table" id="productTable" @click="getEvent">
		<thead>
			<tr>
				<th>name</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Status</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</template>

<script>
export default {
	data() {
		return {
			products: [],
			datatable: {}
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			this.mountDataTable()
		},
		mountDataTable() {
			this.datatable = $('#productTable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/Products/GetAllProductsDataTable'
				},
				columns: [
					{ data: 'name' },
					{ data: 'price' },
					{ data: 'stock' },
					{ data: 'status' },
					{ data: 'description' }
				]
			})
		},
		async getProducts() {
			try {
				this.load = false
				const { data } = await axios.get('Products/GetAllProducts')
				this.products = data.products
				this.load = true
			} catch (error) {
				console.error(error)
			}
			this.mountDataTable()
		},
		getEvent(event) {
			const button = event.target
			if (button.getAttribute('role') == 'edit') {
				this.getProduct(button.getAttribute('data-id'))
			}
			if (button.getAttribute('role') == 'delete') {
				this.deletProduct(button.getAttribute('data-id'))
			}
		},
		async getProduct(product_id) {
			try {
				const { data } = await axios.get(`Products/GetAProduct/${product_id}`)
				this.$parent.editBook(data.product)
			} catch (error) {
				console.error(error)
			}
		},
		async deletProduct(product_id) {
			try {
				const result = await swal.fire({
					icon: 'info',
					title: 'You want delete product?',
					showCancelButton: true,
					confirmButtonText: 'Delete'
				})
				if (!result.isConfirmed) return
				this.datatable.destroy()
				await axios.delete(`Products/DeleteAProduct/${product_id}`)
				this.index()
				swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Libro Eliminado!'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
