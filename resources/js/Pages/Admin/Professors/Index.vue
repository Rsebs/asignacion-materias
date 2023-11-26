<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Alert from '@/Components/Alert.vue';
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import Loading from '@/Components/Loading.vue';

const professors = ref({});
const load = ref(false);
const text = ref('');

onMounted(async () => {
	await getProfessors();
});

async function getProfessors() {
	try {
		load.value = true;
		const res = await axios.get(route('professors.index'));
		professors.value = res.data;
	} catch (error) {
		console.error('Error al traer listado de profesores: ', error);
	} finally {
		load.value = false;
	}
}

async function confirmDelete(id) {
	if (confirm('¿Deseas Eliminar este registro?')) {
		try {
			const res = await axios({
				method: 'delete',
				url: route('professors.destroy', id),
			});

			if (res.status === 200) {
				text.value = res.data.msg;
				return;
			}
		} catch (error) {
			console.error('Error al eliminar profesor: ', error);
		} finally {
			await getProfessors();
		}
	}
}
</script>

<template>
	<AppLayout title="Profesores">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Profesores
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<Link :href="route('professor.create')">
					<PrimaryButton>
						Agregar profesores
					</PrimaryButton>
					</Link>
					<Alert v-if="text !== ''" :type="'success'" :title="'Registro Eliminado'" class="my-4">
						<p v-text="text"></p>
					</Alert>
					<div v-if="load">
						<Loading />
					</div>
					<div v-else v-for="pr in professors">
						<div class="my-4 flex justify-between gap-3">
							<div class="lg:grid grid-cols-3 items-center">
								<p class="font-bold mb-2">Documento: <span v-text="pr.document" class="font-normal"></span>
								</p>
								<p class="font-bold mb-2">Nombres: <span v-text="pr.names" class="font-normal"></span></p>
								<p class="font-bold mb-2">Apellidos: <span v-text="pr.last_names"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Télefono: <span v-text="pr.phone" class="font-normal"></span></p>
								<p class="font-bold mb-2">Email: <span v-text="pr.email" class="font-normal"></span></p>
								<p class="font-bold mb-2 line-clamp-1">Dirección: <span v-text="pr.home_address"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Ciudad: <span v-text="pr.city.name" class="font-normal"></span></p>
								<p class="font-bold mb-2">Registro: <span
										v-text="new Date(pr.created_at).toLocaleDateString()" class="font-normal"></span>
								</p>
							</div>
							<div class="flex flex-col gap-2 justify-center items-center">
								<Link :href="route('professor.show', pr.id)">
								<PrimaryButton>
									Reporte
								</PrimaryButton>
								</Link>
								<Link :href="route('professor.edit', pr.id)">
								<SecondaryButton>
									Editar
								</SecondaryButton>
								</Link>
								<DangerButton @click="confirmDelete(pr.id)">
									Eliminar
								</DangerButton>
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>