<script setup lang="ts">
import { useForm, usePage, Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { toast } from 'vue-sonner';
import { Camera } from 'lucide-vue-next';

import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar';
import AdminLayout from '@/layouts/AdminLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
import { send } from '@/routes/verification';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}

const props = defineProps<Props>();

const page = usePage();
const user = computed(() => page.props.auth.user);

const form = useForm({
    _method: 'PATCH',
    first_name: user.value?.first_name || '',
    last_name: user.value?.last_name || '',
    email: user.value?.email || '',
    phone_number: user.value?.phone_number || '',
    address: user.value?.address || '',
    photo: null as File | null,
});

const photoPreview = ref<string | null>(null);
const photoInput = ref<HTMLInputElement | null>(null);

const selectNewPhoto = () => {
    photoInput.value?.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value?.files?.[0];

    if (!photo) return;

    form.photo = photo;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target?.result as string;
    };

    reader.readAsDataURL(photo);
};

const submit = () => {
    form.post(ProfileController.update.url(), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success('Perfil actualizado correctamente');
            photoPreview.value = null;
            // Clear the file input
            if (photoInput.value) {
                photoInput.value.value = '';
            }
        },
        onError: () => {
            toast.error('Error al actualizar el perfil');
        },
    });
};
</script>

<template>
    <AdminLayout>
        <Head title="Configuración de Perfil" />

        <SettingsLayout>
            <div class="flex flex-col space-y-6">
                <HeadingSmall
                    title="Información del Perfil"
                    description="Actualiza tu información personal y foto de perfil"
                />

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Photo Section -->
                    <div class="flex flex-col items-center sm:flex-row sm:items-start gap-6">
                        <div class="relative group cursor-pointer" @click="selectNewPhoto">
                            <Avatar class="h-24 w-24 sm:h-32 sm:w-32 border-4 border-background shadow-xl">
                                <AvatarImage 
                                    :src="photoPreview || user?.profile_photo_url || user?.avatar || ''" 
                                    class="object-cover" 
                                />
                                <AvatarFallback class="text-2xl font-bold bg-primary text-primary-foreground">
                                    {{ user?.first_name?.charAt(0)?.toUpperCase() || 'U' }}
                                </AvatarFallback>
                            </Avatar>
                            <div class="absolute inset-0 bg-black/40 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <Camera class="w-8 h-8 text-white" />
                            </div>
                        </div>
                        
                        <div class="flex flex-col gap-2 pt-2">
                            <h3 class="font-medium text-lg">Foto de Perfil</h3>
                            <p class="text-sm text-muted-foreground max-w-xs">
                                Haz clic en la foto para cambiarla. Formatos aceptados: JPG, PNG.
                            </p>
                            <Button 
                                type="button" 
                                variant="outline" 
                                size="sm" 
                                class="w-fit mt-2"
                                @click="selectNewPhoto"
                            >
                                Cambiar Foto
                            </Button>
                        </div>

                        <input
                            ref="photoInput"
                            type="file"
                            class="hidden"
                            accept="image/*"
                            @change="updatePhotoPreview"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <Label for="first_name">Nombre</Label>
                            <Input
                                id="first_name"
                                v-model="form.first_name"
                                class="mt-1 block w-full"
                                required
                                autocomplete="given-name"
                                placeholder="Tu nombre"
                            />
                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="last_name">Apellidos</Label>
                            <Input
                                id="last_name"
                                v-model="form.last_name"
                                class="mt-1 block w-full"
                                required
                                autocomplete="family-name"
                                placeholder="Tus apellidos"
                            />
                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Correo Electrónico</Label>
                        <Input
                            id="email"
                            type="email"
                            v-model="form.email"
                            class="mt-1 block w-full"
                            required
                            autocomplete="username"
                            placeholder="correo@ejemplo.com"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <Label for="phone_number">Teléfono</Label>
                            <Input
                                id="phone_number"
                                v-model="form.phone_number"
                                class="mt-1 block w-full"
                                autocomplete="tel"
                                placeholder="Número de teléfono"
                            />
                            <InputError class="mt-2" :message="form.errors.phone_number" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="address">Dirección</Label>
                            <Input
                                id="address"
                                v-model="form.address"
                                class="mt-1 block w-full"
                                autocomplete="street-address"
                                placeholder="Tu dirección"
                            />
                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>
                    </div>

                    <div v-if="props.mustVerifyEmail && !user.email_verified_at">
                        <p class="-mt-4 text-sm text-muted-foreground">
                            Tu dirección de correo no está verificada.
                            <Link
                                :href="send()"
                                as="button"
                                class="text-foreground underline decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:decoration-current! dark:decoration-neutral-500"
                            >
                                Haz clic aquí para reenviar el correo de verificación.
                            </Link>
                        </p>

                        <div
                            v-if="props.status === 'verification-link-sent'"
                            class="mt-2 text-sm font-medium text-green-600"
                        >
                            Se ha enviado un nuevo enlace de verificación a tu correo.
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <Button
                            :disabled="form.processing"
                            type="submit"
                        >
                            Guardar Cambios
                        </Button>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p
                                v-if="form.recentlySuccessful"
                                class="text-sm text-muted-foreground"
                            >
                                Guardado.
                            </p>
                        </Transition>
                    </div>
                </form>
            </div>
        </SettingsLayout>
    </AdminLayout>
</template>
