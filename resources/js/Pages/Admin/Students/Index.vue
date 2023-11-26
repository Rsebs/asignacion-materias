<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Alert from '@/Components/Alert.vue';
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const students = ref({});
const load = ref(false);
const text = ref('');

onMounted(async () => {
	await getStudents();
});

async function getStudents() {
	try {
		load.value = true;
		const res = await axios.get(route('students.index'));
		students.value = res.data;
	} catch (error) {
		console.error('Error al traer listado de estudiantes: ', error);
	} finally {
		load.value = false;
	}
}

async function confirmDelete(id) {
	if (confirm('¿Deseas Eliminar este registro?')) {
		try {
			const res = await axios({
				method: 'delete',
				url: route('students.destroy', id),
			});

			if (res.status === 200) {
				text.value = res.data.msg;
				return;
			}
		} catch (error) {
			console.error('Error al eliminar estudiante: ', error);
		} finally {
			await getStudents();
		}
	}
}
</script>

<template>
	<AppLayout title="Estudiantes">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Estudiantes
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<Link :href="route('student.create')">
					<PrimaryButton>
						Agregar estudiantes
					</PrimaryButton>
					</Link>
					<Alert v-if="text !== ''" :type="'success'" :title="'Registro Eliminado'" class="my-4">
						<p v-text="text"></p>
					</Alert>
					<div v-if="load">
						<div class="sk-cube-grid">
							<div class="sk-cube sk-cube1"></div>
							<div class="sk-cube sk-cube2"></div>
							<div class="sk-cube sk-cube3"></div>
							<div class="sk-cube sk-cube4"></div>
							<div class="sk-cube sk-cube5"></div>
							<div class="sk-cube sk-cube6"></div>
							<div class="sk-cube sk-cube7"></div>
							<div class="sk-cube sk-cube8"></div>
							<div class="sk-cube sk-cube9"></div>
						</div>
					</div>
					<div v-else v-for="st in students">
						<div class="my-4 flex justify-between gap-3">
							<div class="lg:grid grid-cols-3 items-center">
								<p class="font-bold mb-2">Documento: <span v-text="st.document" class="font-normal"></span>
								</p>
								<p class="font-bold mb-2">Nombres: <span v-text="st.names" class="font-normal"></span></p>
								<p class="font-bold mb-2">Apellidos: <span v-text="st.last_names"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Télefono: <span v-text="st.phone" class="font-normal"></span></p>
								<p class="font-bold mb-2">Email: <span v-text="st.email" class="font-normal"></span></p>
								<p class="font-bold mb-2 line-clamp-1">Dirección: <span v-text="st.home_address"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Ciudad: <span v-text="st.city.name" class="font-normal"></span></p>
								<p class="font-bold mb-2">Registro: <span
										v-text="new Date(st.created_at).toLocaleDateString()" class="font-normal"></span>
								</p>
							</div>
							<div class="flex flex-col gap-2 justify-center items-center">
								<Link :href="route('student.show', st.id)">
								<PrimaryButton>
									Reporte
								</PrimaryButton>
								</Link>
								<Link :href="route('student.edit', st.id)">
								<SecondaryButton>
									Editar
								</SecondaryButton>
								</Link>
								<DangerButton @click="confirmDelete(st.id)">
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