<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const { course } = defineProps([
	'course'
]);

</script>

<template>
	<AppLayout title="Asignaturas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Asignaturas INFORMACIÓN
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<h1 class="text-red-700 text-3xl my-5 uppercase font-bold text-center">Reporte Asignatura</h1>
					<div>
						<InputLabel for="name" value="Nombre" />
						<TextInput :value="course.name" id="name" type="text" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<InputLabel for="description" value="Descripción" />
						<textarea readonly v-text="course.description" id="description"
							class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"></textarea>
					</div>
					<div>
						<InputLabel for="credits" value="Créditos" />
						<TextInput :value="course.credits" id="name" type="text" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<InputLabel for="elective" value="Electiva" />
						<TextInput :value="course.elective ? 'Si' : 'No'" id="name" type="text" class="mt-1 block w-full"
							readonly />
					</div>
					<div>
						<InputLabel for="knowledge_area" value="Área de conocimiento" />
						<TextInput :value="course.knowledge_area" id="name" type="text" class="mt-1 block w-full"
							readonly />
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>