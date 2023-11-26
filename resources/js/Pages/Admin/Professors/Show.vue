<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const { professor, city, courses } = defineProps([
	'professor',
	'city',
	'courses'
]);

</script>

<template>
	<AppLayout title="Profesores">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Página de Profesores REPORTE
			</h2>
		</template>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
					<h1 class="text-red-700 text-3xl my-5 uppercase font-bold text-center">Reporte profesor</h1>
					<div>
						<InputLabel for="document" value="Documento" />
						<TextInput :value="professor.document" id="document" type="text" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<InputLabel for="names" value="Nombres" />
						<TextInput :value="professor.names" id="names" type="text" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<InputLabel for="last_names" value="Apellidos" />
						<TextInput :value="professor.last_names" id="last_names" type="text" class="mt-1 block w-full"
							readonly />
					</div>
					<div>
						<InputLabel for="phone" value="Télefono" />
						<TextInput :value="professor.phone" id="phone" type="tel" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<InputLabel for="email" value="Email" />
						<TextInput :value="professor.email" id="email" type="email" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<InputLabel for="home_address" value="Dirección" />
						<TextInput :value="professor.home_address" id="home_address" type="text" class="mt-1 block w-full"
							readonly />
					</div>
					<div>
						<InputLabel for="city" value="Ciudad" />
						<TextInput :value="city.name" id="city" type="text" class="mt-1 block w-full" readonly />
					</div>
					<div>
						<p class="text-gray-700 text-1xl my-5 uppercase font-bold">Cursos que enseña</p>
						<table class="table-auto border-collapse border border-slate-400 mt-2 w-full">
							<thead>
								<tr>
									<th class="border border-slate-300">Curso</th>
									<th class="border border-slate-300">Créditos</th>
									
								</tr>
							</thead>
							<tbody>
								<tr v-for="c in courses">
									<td v-text="c.name" class="border border-slate-300 p-1 text-center"></td>
									<td v-text="c.credits" class="border border-slate-300 p-1 text-center"></td>
									
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>