<template>
	<div class="modal fade" id="product_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						{{ `${is_create ? 'Crear' : 'Actualizar'} Product` }}
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="storeProduct" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="images" class="form-label">Imagen</label>
							<input type="file" class="form-control" id="file" accept="image/*" @change="loadImage">
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" v-model="product.name">
						</div>
						<div class="mb-3">
							<label for="price" class="form-label">Price</label>
							<input type="number" class="form-control" id="price" v-model="product.price">
						</div>
						<div class="mb-3">
							<label for="stock" class="form-label">Stock</label>
							<input type="number" class="form-control" id="stock" v-model="product.stock">
						</div>
						<div class="mb-3">
							<label for="status" class="form-label">Status</label>
							<input type="text" class="form-control" id="status" v-model="product.status">
						</div>
						<div class="mb-3">
							<label for="description" class="form-label">Descripción</label>
							<textarea class="form-control" id="description" rows="3"
								v-model="product.description"></textarea>
						</div>
						<div class="mb-3">
							<label for="category" class="form-label">Categorias</label>
							<v-select id="category" :options="categories" v-model="prodcut.category_id"
								:reduce="category => category.id" label="name" :clearable="false">
							</v-select>
						</div>


						<hr>
						<section class="d-flex justify-content-end mt-3">
							<button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary me-1">
								{{ `${is_create ? 'Crear' : 'Actualizar'}` }}
							</button>
						</section>
					</form>
				</div>

			</div>
		</div>
	</div>
</template>

<script>
import axios from 'axios'
export default {
	props: ['product_data'],
	data() {
		return {
			is_create: true,
			categories: [],
			product: {},
			file: null
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.getCategories()
			this.setProduct()
		},
		setProduct() {
			if (!this.product_data) return
			this.product = { ...this.product_data }
			this.is_create = false
		},
		loadImage(event) {
			this.file = event.target.files[0]
		},
		loadFormData() {
			const form_data = new FormData()
			if (this.file) form_data.append('image', this.file, this.file.name)
			form_data.append('name', this.product.name)
			form_data.append('price', this.product.price)
			form_data.append('stock', this.product.stock)
			form_data.append('status', this.product.status)
			form_data.append('description', this.product.description)
			form_data.append('category_id', this.product.category_id)
			return form_data
		},
		async getCategories() {
			const { data } = await axios.get('Categories/GetAllCategories')
			this.categories = data.categories
		},
		async ProductBook() {
			try {
				const product = this.loadFormData()
				if (this.is_create) {
					await axios.post('Products/SaveProduct', product)
				} else {
					await axios.post(`Products/UpdateProdct/${this.prodcut.id}`, product)
				}
				swal.fire({
					icon: 'success',
					title: 'Congratulations!',
					text: 'Save Product!'
				})
				this.$parent.closeModal()
			} catch (error) {
				console.error(error)
				swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'This is bad!'
				})
			}
		}
	}
}
</script>

<style></style>
