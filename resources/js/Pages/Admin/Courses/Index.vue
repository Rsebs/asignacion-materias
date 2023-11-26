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

const courses = ref({});
const load = ref(false);
const text = ref('');

onMounted(async () => {
	await getCourses();
});

async function getCourses() {
	try {
		load.value = true;
		const res = await axios.get(route('courses.index'));
		courses.value = res.data;
	} catch (error) {
		console.error('Error al traer listado de cursos: ', error);
	} finally {
		load.value = false;
	}
}

async function confirmDelete(id) {
	if (confirm('¿Deseas Eliminar este registro?')) {
		try {
			const res = await axios({
				method: 'delete',
				url: route('courses.destroy', id),
			});

			if (res.status === 200) {
				text.value = res.data.msg;
				return;
			}
		} catch (error) {
			console.error('Error al eliminar curso: ', error);
		} finally {
			await getCourses();
		}
	}
}
</script>

<template>
	<AppLayout title="Asignaturas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Asignaturas
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<Link :href="route('course.create')">
					<PrimaryButton>
						Agregar Asignaturas
					</PrimaryButton>
					</Link>
					<Alert v-if="text !== ''" :type="'success'" :title="'Registro Eliminado'" class="my-4">
						<p v-text="text"></p>
					</Alert>
					<div v-if="load">
						<Loading />
					</div>
					<div v-else v-for="course in courses">
						<div class="my-4 flex justify-between gap-3">
							<div class="lg:grid grid-cols-3 items-center">
								<p class="font-bold mb-2">Nombre: <span v-text="course.name" class="font-normal"></span>
								</p>
								<p class="font-bold mb-2">Créditos: <span v-text="course.credits"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Área de Conocimiento: <span v-text="course.knowledge_area"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Electiva: <span v-text="course.elective ? 'Si' : 'No'"
										class="font-normal"></span></p>
								<p class="font-bold mb-2 line-clamp-1">description: <span v-text="course.description"
										class="font-normal"></span></p>
								<p class="font-bold mb-2">Registro: <span
										v-text="new Date(course.created_at).toLocaleDateString()"
										class="font-normal"></span>
								</p>
							</div>
							<div class="flex flex-col gap-2 justify-center items-center">
								<Link :href="route('course.show', course.id)">
								<PrimaryButton>
									Informacíon
								</PrimaryButton>
								</Link>
								<Link :href="route('course.edit', course.id)">
								<SecondaryButton>
									Editar
								</SecondaryButton>
								</Link>
								<DangerButton @click="confirmDelete(course.id)">
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