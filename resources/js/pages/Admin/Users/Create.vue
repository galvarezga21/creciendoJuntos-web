<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Checkbox } from '@/components/ui/checkbox';
import { ArrowLeft, Save } from 'lucide-vue-next';

const props = defineProps<{
    roles: Array<{ id: number; name: string }>;
    countries: Array<{ id: number; name: string }>;
}>();

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    role_id: '',
    country_id: '',
    phone_number: '',
    address: '',
    is_active: true,
});

const submit = () => {
    form.post(route('admin.users.store'));
};
</script>

<template>
    <Head title="Crear Usuario - Admin" />
    <AdminLayout>
        <div class="max-w-3xl mx-auto flex flex-col gap-6">
            <div class="flex items-center gap-4">
                <Link :href="route('admin.users.index')">
                    <Button variant="outline" size="icon">
                        <ArrowLeft class="h-4 w-4" />
                    </Button>
                </Link>
                <h1 class="text-3xl font-bold tracking-tight">Crear Usuario</h1>
            </div>

            <Card>
                <CardHeader>
                    <CardTitle>Información Personal</CardTitle>
                    <CardDescription>
                        Ingresa los datos del nuevo usuario. La contraseña es obligatoria.
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <form @submit.prevent="submit" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <Label for="first_name">Nombres</Label>
                                <Input id="first_name" v-model="form.first_name" placeholder="Ej. Juan" required />
                                <div v-if="form.errors.first_name" class="text-sm text-red-500">{{ form.errors.first_name }}</div>
                            </div>
                            <div class="space-y-2">
                                <Label for="last_name">Apellidos</Label>
                                <Input id="last_name" v-model="form.last_name" placeholder="Ej. Pérez" required />
                                <div v-if="form.errors.last_name" class="text-sm text-red-500">{{ form.errors.last_name }}</div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <Label for="email">Correo Electrónico</Label>
                            <Input id="email" type="email" v-model="form.email" placeholder="juan@example.com" required />
                            <div v-if="form.errors.email" class="text-sm text-red-500">{{ form.errors.email }}</div>
                        </div>

                        <div class="space-y-2">
                            <Label for="password">Contraseña</Label>
                            <Input id="password" type="password" v-model="form.password" placeholder="********" required />
                            <div v-if="form.errors.password" class="text-sm text-red-500">{{ form.errors.password }}</div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <Label for="role_id">Rol</Label>
                                <Select v-model="form.role_id">
                                    <SelectTrigger>
                                        <SelectValue placeholder="Seleccionar Rol" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem v-for="role in roles" :key="role.id" :value="String(role.id)">
                                            {{ role.name }}
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <div v-if="form.errors.role_id" class="text-sm text-red-500">{{ form.errors.role_id }}</div>
                            </div>

                            <div class="space-y-2">
                                <Label for="country_id">País</Label>
                                <Select v-model="form.country_id">
                                    <SelectTrigger>
                                        <SelectValue placeholder="Seleccionar País" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem v-for="country in countries" :key="country.id" :value="String(country.id)">
                                            {{ country.name }}
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <div v-if="form.errors.country_id" class="text-sm text-red-500">{{ form.errors.country_id }}</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                             <div class="space-y-2">
                                <Label for="phone_number">Teléfono</Label>
                                <Input id="phone_number" v-model="form.phone_number" placeholder="+51 999 999 999" />
                                <div v-if="form.errors.phone_number" class="text-sm text-red-500">{{ form.errors.phone_number }}</div>
                            </div>
                             <div class="space-y-2">
                                <Label for="address">Dirección</Label>
                                <Input id="address" v-model="form.address" placeholder="Av. Principal 123" />
                                <div v-if="form.errors.address" class="text-sm text-red-500">{{ form.errors.address }}</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <Checkbox id="is_active" :checked="form.is_active" @update:checked="form.is_active = $event" />
                            <Label for="is_active">Usuario Activo</Label>
                        </div>

                        <div class="flex justify-end pt-4">
                            <Button type="submit" :disabled="form.processing">
                                <Save class="mr-2 h-4 w-4" />
                                Guardar Usuario
                            </Button>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    </AdminLayout>
</template>
