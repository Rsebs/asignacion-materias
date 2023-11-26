<script setup>
import { getApi } from '@/functions.js';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, onMounted } from 'vue';
import Loading from '@/Components/Loading.vue';

const { professor, coursesProfessor } = defineProps([
	'professor',
	'coursesProfessor'
]);

const cities = ref({});
const courses = ref({});
const document = ref(professor.document);
const names = ref(professor.names);
const last_names = ref(professor.last_names);
const phone = ref(professor.phone);
const email = ref(professor.email);
const home_address = ref(professor.home_address);
const city_id = ref(professor.city_id);
const load = ref(true);

onMounted(async () => {
	await getCities();
	await getCourses();
	load.value = false;
});


async function getCities() {
	const res = await getApi(route('cities.index'), 'GET');
	cities.value = res.data;
}

async function getCourses() {
	const res = await getApi(route('courses.index'), 'GET');
	courses.value = res.data;
}

async function update() {
	const data = {
		document: document.value,
		names: names.value,
		last_names: last_names.value,
		phone: phone.value,
		email: email.value,
		home_address: home_address.value,
		city_id: parseInt(city_id.value),
	}

	// Actualiza el estudiante en la base de datos
	getApi(route('professors.update', professor.id), 'PUT', data);

	alert('Registro Guardado');

	setTimeout(() => {
		window.location.href = route('professor.index');
	}, 2000);
	return;

}
</script>

<template>
	<AppLayout title="Profesores">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Profesores EDITAR
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<form @submit.prevent="update">
						<h1 class="text-red-700 text-3xl my-5 uppercase font-bold text-center">Editar profesor</h1>
						<div>
							<InputLabel for="document" value="Documento" />
							<TextInput v-model="document" id="document" type="text" class="mt-1 block w-full" required
								autofocus autocomplete="username" />
						</div>
						<div>
							<InputLabel for="names" value="Nombres" />
							<TextInput v-model="names" id="names" type="text" class="mt-1 block w-full" required
								autocomplete="username" />
						</div>
						<div>
							<InputLabel for="last_names" value="Apellidos" />
							<TextInput v-model="last_names" id="last_names" type="text" class="mt-1 block w-full" required
								autocomplete="username" />
						</div>
						<div>
							<InputLabel for="phone" value="Télefono" />
							<TextInput v-model="phone" id="phone" type="tel" class="mt-1 block w-full" required
								autocomplete="username" />
						</div>
						<div>
							<InputLabel for="email" value="Email" />
							<TextInput v-model="email" id="email" type="email" class="mt-1 block w-full" required
								autocomplete="username" />
						</div>
						<div>
							<InputLabel for="home_address" value="Dirección" />
							<TextInput v-model="home_address" id="home_address" type="text" class="mt-1 block w-full"
								required autocomplete="username" />
						</div>
						<div>
							<InputLabel for="city" value="Ciudad" />
							<select v-model="city_id"
								class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
								<option v-for="c in cities" v-text="c.name" :value="c.id"></option>
							</select>
						</div>
						<div>
							<table class="table-auto border-collapse border border-slate-400 mt-2 w-full">
								<thead>
									<tr>
										<th class="border border-slate-300">Curso</th>
										<th class="border border-slate-300">Créditos</th>
										<th class="border border-slate-300">Aplica</th>
									</tr>
								</thead>
								<tbody>
									<tr v-if="load">
										<td colspan="3">
											<Loading />
										</td>
									</tr>
									<tr v-else v-for="c in courses">
										<td v-text="c.name" class="border border-slate-300 p-1 text-center"></td>
										<td v-text="c.credits" class="border border-slate-300 p-1 text-center"></td>
										<td class="border border-slate-300 p-1 text-center">
											<input :checked="coursesProfessor.some(course => course.id === c.id)" type="checkbox">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<PrimaryButton class="mt-4">
							Guardar
						</PrimaryButton>
					</form>
				</div>
			</div>
		</div>
</AppLayout></template>