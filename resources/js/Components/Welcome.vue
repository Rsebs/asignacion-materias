<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Bienvenido a tu sistema de asignación de materias!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                En este sistema podrás administrar profesores, estudiantes, asignaturas y ver reportes de estudiantes. Para
                empezar revisa la barra de navegación superior o puedes acceder mediante los siguientes enlaces.
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="36"
                        height="36" viewBox="0 0 24 24" stroke-width="1" stroke="#B31312" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        <a :href="route('student.index')">Estudiantes</a>
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Aquí puedes:
                </p>

                <ul class="mt-2 text-gray-500 text-sm leading-relaxed">
                    <li>1. Administrar estudiantes.</li>
                    <li>2. Matricular nuevos estudiantes.</li>
                    <li>3. Ver reportes.</li>
                    <li>4. Agregar nuevas asignaturas.</li>
                </ul>

                <p class="mt-4 text-sm">
                    <a :href="route('student.index')" class="inline-flex items-center font-semibold text-red-700">
                        Consultar estudiantes

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-red-700">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eyeglass" width="36"
                        height="36" viewBox="0 0 24 24" stroke-width="1" stroke="#B31312" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 4h-2l-3 10" />
                        <path d="M16 4h2l3 10" />
                        <path d="M10 16l4 0" />
                        <path d="M21 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5" />
                        <path d="M10 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5" />
                    </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        <a :href="route('professor.index')">Profesores</a>
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Aquí puedes:
                </p>

                <ul class="mt-2 text-gray-500 text-sm leading-relaxed">
                    <li>1. Administrar profesores.</li>
                    <li>2. Contratar nuevos profesores.</li>
                    <li>3. Asignaturas que enseña.</li>
                </ul>

                <p class="mt-4 text-sm">
                    <a :href="route('professor.index')" class="inline-flex items-center font-semibold text-red-700">
                        Consultar profesores

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-red-700">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="36" height="36"
                        viewBox="0 0 24 24" stroke-width="1" stroke="#B31312" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6l0 13" />
                        <path d="M12 6l0 13" />
                        <path d="M21 6l0 13" />
                    </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        <a :href="route('course.index')">Asignaturas</a>
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Aquí puedes:
                </p>

                <ul class="mt-2 text-gray-500 text-sm leading-relaxed">
                    <li>1. Administrar asignaturas.</li>
                    <li>2. Agregar nuevas asignaturas.</li>
                    <li>3. Cantidad de estudiantes que ven una asignatura.</li>
                </ul>

                <p class="mt-4 text-sm">
                    <a :href="route('course.index')" class="inline-flex items-center font-semibold text-red-700">
                        Consultar asignaturas

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-red-700">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>
