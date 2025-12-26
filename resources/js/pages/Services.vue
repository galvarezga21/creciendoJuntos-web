<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle, CardDescription, CardFooter } from '@/components/ui/card';
import { Brain, Heart, Users, Baby, Briefcase, Smile, Check, ArrowRight, Calendar, MessageCircle, FileText, CheckCircle2 } from 'lucide-vue-next';

const services = [
    {
        title: 'Terapia Individual',
        description: 'Espacio personal para abordar ansiedad, depresión, duelo y crecimiento personal.',
        features: ['Manejo de ansiedad', 'Superación de depresión', 'Autoestima', 'Duelo'],
        icon: Brain,
        color: 'text-blue-500',
        bg: 'bg-blue-50'
    },
    {
        title: 'Terapia de Pareja',
        description: 'Herramientas para mejorar la comunicación y fortalecer el vínculo afectivo.',
        features: ['Resolución de conflictos', 'Comunicación asertiva', 'Reconstrucción de confianza', 'Intimidad emocional'],
        icon: Heart,
        color: 'text-red-500',
        bg: 'bg-red-50'
    },
    {
        title: 'Terapia Familiar',
        description: 'Resolución de conflictos y mejora de la dinámica en el núcleo familiar.',
        features: ['Dinámicas familiares', 'Límites saludables', 'Crianza respetuosa', 'Apoyo en crisis'],
        icon: Users,
        color: 'text-green-500',
        bg: 'bg-green-50'
    },
    {
        title: 'Terapia Infantil',
        description: 'Atención especializada para niños con problemas de conducta o emocionales.',
        features: ['Problemas de conducta', 'Gestión emocional', 'TDAH', 'Habilidades sociales'],
        icon: Baby,
        color: 'text-yellow-500',
        bg: 'bg-yellow-50'
    },
    {
        title: 'Orientación Vocacional',
        description: 'Ayuda para descubrir tus talentos y elegir tu camino profesional.',
        features: ['Evaluación de aptitudes', 'Exploración de intereses', 'Plan de carrera', 'Toma de decisiones'],
        icon: Briefcase,
        color: 'text-purple-500',
        bg: 'bg-purple-50'
    },
    {
        title: 'Talleres de Bienestar',
        description: 'Sesiones grupales sobre manejo del estrés, mindfulness y habilidades sociales.',
        features: ['Mindfulness', 'Gestión del estrés', 'Inteligencia emocional', 'Crecimiento grupal'],
        icon: Smile,
        color: 'text-orange-500',
        bg: 'bg-orange-50'
    }
];

const processSteps = [
    {
        number: '01',
        title: 'Contacto Inicial',
        description: 'Agenda tu cita a través de la web o WhatsApp. Resolveremos tus dudas iniciales.',
        icon: MessageCircle
    },
    {
        number: '02',
        title: 'Primera Entrevista',
        description: 'Evaluación inicial para conocer tu historia y definir los objetivos terapéuticos.',
        icon: Calendar
    },
    {
        number: '03',
        title: 'Plan de Tratamiento',
        description: 'Diseñamos juntos una estrategia personalizada con herramientas prácticas.',
        icon: FileText
    },
    {
        number: '04',
        title: 'Seguimiento y Alta',
        description: 'Sesiones regulares para trabajar en tus metas hasta lograr tu autonomía.',
        icon: CheckCircle2
    }
];

const pricingPlans = [
    {
        name: 'Sesión Individual',
        price: 'S/ 100',
        period: '/ sesión',
        description: 'Ideal para procesos personales continuos.',
        features: ['50 minutos de duración', 'Modalidad online o presencial', 'Material de apoyo digital', 'Seguimiento por WhatsApp'],
        recommended: false
    },
    {
        name: 'Paquete Mensual',
        price: 'S/ 360',
        period: '/ 4 sesiones',
        description: 'Compromiso con tu bienestar a mejor precio.',
        features: ['4 sesiones de 50 minutos', 'Ahorro del 10%', 'Prioridad en agendamiento', 'Material exclusivo'],
        recommended: true
    },
    {
        name: 'Terapia de Pareja',
        price: 'S/ 150',
        period: '/ sesión',
        description: 'Espacio para construir juntos.',
        features: ['60 minutos de duración', 'Ejercicios prácticos para casa', 'Evaluación de la dinámica', 'Mediación de conflictos'],
        recommended: false
    }
];
</script>

<template>
    <Head title="Servicios - Creciendo Juntos" />
    <PublicLayout>
         <!-- Hero Small -->
        <section class="bg-muted/30 py-16 md:py-24 relative overflow-hidden">
             <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] opacity-50"></div>
            <div class="container mx-auto px-4 text-center relative z-10">
                <h1 class="text-3xl md:text-5xl font-bold text-foreground mb-4">Mis Servicios</h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Soluciones terapéuticas adaptadas a tus necesidades específicas.</p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <Card v-for="service in services" 
                        :key="service.title" 
                        class="group hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-muted overflow-hidden flex flex-col"
                    >
                        <div class="h-2 w-full" :class="service.bg.replace('bg-', 'bg-').replace('50', '500')"></div>
                        <CardHeader>
                            <div :class="`w-14 h-14 rounded-2xl ${service.bg} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300`">
                                <component :is="service.icon" :class="`w-8 h-8 ${service.color}`" />
                            </div>
                            <CardTitle class="text-xl">{{ service.title }}</CardTitle>
                        </CardHeader>
                        <CardContent class="flex-grow">
                            <CardDescription class="text-base text-muted-foreground mb-4">
                                {{ service.description }}
                            </CardDescription>
                            <ul class="space-y-2">
                                <li v-for="feature in service.features" :key="feature" class="flex items-center text-sm text-muted-foreground">
                                    <Check class="w-4 h-4 mr-2 text-green-500" />
                                    {{ feature }}
                                </li>
                            </ul>
                        </CardContent>
                        <CardFooter class="pt-4 mt-auto">
                            <Link href="/contact" class="w-full">
                                <Button variant="outline" class="w-full group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                    Agendar Cita
                                </Button>
                            </Link>
                        </CardFooter>
                    </Card>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="py-20 bg-muted/30">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold mb-4">¿Cómo es el proceso?</h2>
                    <p class="text-muted-foreground text-lg">
                        Un camino estructurado y claro para que sepas qué esperar en cada etapa de tu tratamiento.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                     <!-- Connecting Line (Desktop) -->
                    <div class="hidden md:block absolute top-12 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-primary/20 to-transparent -z-10"></div>

                    <div v-for="(step, index) in processSteps" :key="index" class="relative flex flex-col items-center text-center group">
                        <div class="w-24 h-24 rounded-full bg-white border-4 border-muted group-hover:border-primary transition-colors flex items-center justify-center mb-6 shadow-sm z-10">
                            <component :is="step.icon" class="w-10 h-10 text-primary" />
                        </div>
                        <div class="absolute top-0 right-0 bg-primary text-primary-foreground text-xs font-bold px-2 py-1 rounded-full transform translate-x-2 -translate-y-2">
                            {{ step.number }}
                        </div>
                        <h3 class="text-xl font-bold mb-3">{{ step.title }}</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed max-w-xs">
                            {{ step.description }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold mb-4">Inversión en tu Bienestar</h2>
                    <p class="text-muted-foreground text-lg">
                        Tarifas claras y accesibles. Tu salud mental es una prioridad.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <Card v-for="(plan, index) in pricingPlans" :key="index" 
                        class="relative flex flex-col border-muted hover:border-primary transition-colors hover:shadow-lg"
                        :class="{ 'border-primary shadow-lg scale-105 z-10': plan.recommended }"
                    >
                        <div v-if="plan.recommended" class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-primary-foreground px-4 py-1 rounded-full text-sm font-medium">
                            Más Popular
                        </div>
                        <CardHeader class="text-center pb-2">
                            <CardTitle class="text-xl mb-2">{{ plan.name }}</CardTitle>
                            <div class="flex items-baseline justify-center gap-1">
                                <span class="text-4xl font-bold text-foreground">{{ plan.price }}</span>
                                <span class="text-muted-foreground text-sm">{{ plan.period }}</span>
                            </div>
                            <CardDescription class="mt-2">
                                {{ plan.description }}
                            </CardDescription>
                        </CardHeader>
                        <CardContent class="flex-grow pt-6">
                            <ul class="space-y-4">
                                <li v-for="(feature, idx) in plan.features" :key="idx" class="flex items-start gap-3 text-sm text-muted-foreground">
                                    <CheckCircle2 class="w-5 h-5 text-primary shrink-0" />
                                    <span>{{ feature }}</span>
                                </li>
                            </ul>
                        </CardContent>
                        <CardFooter>
                            <Link href="/contact" class="w-full">
                                <Button :variant="plan.recommended ? 'default' : 'outline'" class="w-full h-12 rounded-full">
                                    Elegir Plan
                                </Button>
                            </Link>
                        </CardFooter>
                    </Card>
                </div>
            </div>
        </section>

        <!-- Pricing / CTA -->
        <section class="py-20 bg-slate-50 dark:bg-slate-900/50">
            <div class="container max-w-5xl mx-auto px-4 md:px-6 text-center">
                <h2 class="text-3xl font-bold mb-6">¿Tienes dudas sobre qué servicio es para ti?</h2>
                <p class="text-muted-foreground mb-8 max-w-xl mx-auto">
                    No te preocupes. En nuestra primera consulta de evaluación podremos definir juntos el mejor plan de acción para tu bienestar.
                </p>
                <Link href="/contact">
                    <Button size="lg" class="rounded-full px-8 shadow-lg shadow-primary/20">
                        Contactar ahora
                    </Button>
                </Link>
            </div>
        </section>
    </PublicLayout>
</template>
