<script setup>
import { getApi } from '@/functions.js';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, onMounted } from 'vue';

const { course } = defineProps([
	'course'
]);

const inputCheck = ref('');
const name = ref(course.name);
const description = ref(course.description);
const credits = ref(course.credits);
const knowledge_area = ref(course.knowledge_area);

let isChecked;
onMounted(() => {
	const input = inputCheck.value;
	isChecked = input;
});

function check(event) {
	isChecked = event.target;
}

async function update() {
	const data = {
		name: name.value,
		description: description.value,
		credits: credits.value,
		elective: isChecked.checked,
		knowledge_area: knowledge_area.value,
	}

	// Actualiza el estudiante en la base de datos
	getApi(route('courses.update', course.id), 'PUT', data);

	alert('Registro Guardado');

	setTimeout(() => {
		window.location.href = route('course.index');
	}, 2000);
	return;

}
</script>

<template>
	<AppLayout title="Asignaturas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Asignaturas EDITAR
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<form @submit.prevent="update" action="#">
						<h1 class="text-red-700 text-3xl my-5 uppercase font-bold text-center">Agregar Asignatura</h1>
						<div>
							<InputLabel for="name" value="Nombre" />
							<TextInput v-model="name" id="name" type="text" class="mt-1 block w-full" required autofocus
								autocomplete="username" />
						</div>
						<div>
							<InputLabel for="description" value="Descripción" />
							<textarea v-model="description" id="description"
								class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"></textarea>
						</div>
						<div>
							<InputLabel for="credits" value="Créditos" />
							<TextInput v-model="credits" id="credits" type="number" min="1" max="9"
								class="mt-1 block w-full" required autocomplete="username" />
						</div>
						<div>
							<InputLabel for="elective" value="Electiva" />
							<input @change="check($event)" ref="inputCheck" type="checkbox" class="mt-1 block">
						</div>
						<div>
							<InputLabel for="knowledge_area" value="Área de conocimiento" />
							<select v-model="knowledge_area" id="knowledge_area"
								class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
								<option value="Ciencias">Ciencias</option>
								<option value="Programación">Programación</option>
								<option value="Artes">Artes</option>
								<option value="Historia">Historia</option>
								<option value="Matemáticas">Matemáticas</option>
							</select>
						</div>
						<PrimaryButton class="mt-4">
							Guardar
						</PrimaryButton>
					</form>
				</div>
			</div>
		</div>
	</AppLayout>
</template>