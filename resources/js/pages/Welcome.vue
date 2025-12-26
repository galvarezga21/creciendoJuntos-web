<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';
import { ArrowRight, Heart, Shield, Sparkles, Brain, Quote, Star, ChevronDown, CheckCircle2, Calendar, Clock, ArrowUpRight } from 'lucide-vue-next';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

const testimonials = [
    {
        text: "La terapia con Diana cambió mi vida. Aprendí a gestionar mi ansiedad y ahora disfruto mucho más de mi día a día.",
        name: "María G.",
        initial: "M"
    },
    {
        text: "Un espacio seguro donde realmente te sientes escuchado. Las herramientas que me brindó fueron muy prácticas y efectivas.",
        name: "Carlos R.",
        initial: "C"
    },
    {
        text: "Llevé a mi hijo por problemas de conducta y el cambio ha sido notable. Estamos muy agradecidos por su paciencia y dedicación.",
        name: "Ana P.",
        initial: "A"
    }
];

const faqs = [
    {
        question: "¿Cómo sé si necesito terapia?",
        answer: "Si sientes que tus emociones afectan tu vida diaria, relaciones o trabajo, o si simplemente buscas crecimiento personal, la terapia es una excelente opción. No necesitas tener un 'problema grave' para beneficiarte de ella."
    },
    {
        question: "¿Cuánto dura cada sesión?",
        answer: "Las sesiones tienen una duración aproximada de 50 a 60 minutos. La frecuencia se determina según tus necesidades específicas en la primera consulta."
    },
    {
        question: "¿Aceptan seguros médicos?",
        answer: "Actualmente trabajamos de manera particular, pero emitimos recibos que pueden ser presentados a tu seguro para reembolso, dependiendo de tu póliza."
    },
    {
        question: "¿Es confidencial?",
        answer: "Absolutamente. Todo lo conversado en sesión está protegido por el secreto profesional y ética psicológica, salvo situaciones de riesgo inminente para ti o terceros."
    }
];

const blogPosts = [
    {
        title: "5 Técnicas de Mindfulness para reducir la ansiedad",
        excerpt: "Descubre ejercicios sencillos que puedes practicar en cualquier lugar para recuperar la calma y el enfoque.",
        category: "Bienestar",
        date: "20 Dic, 2024",
        readTime: "5 min",
        image: "https://images.unsplash.com/photo-1544367563-12123d8965cd?q=80&w=2070&auto=format&fit=crop"
    },
    {
        title: "Cómo establecer límites saludables en familia",
        excerpt: "Aprende a decir 'no' desde el amor y el respeto para mejorar la convivencia y fortalecer los vínculos familiares.",
        category: "Familia",
        date: "15 Dic, 2024",
        readTime: "7 min",
        image: "https://images.unsplash.com/photo-1511895426328-dc8714191300?q=80&w=2070&auto=format&fit=crop"
    },
    {
        title: "El impacto del sueño en tu salud mental",
        excerpt: "Dormir bien no es un lujo, es una necesidad. Conoce la relación directa entre el descanso y tus emociones.",
        category: "Salud",
        date: "10 Dic, 2024",
        readTime: "4 min",
        image: "https://images.unsplash.com/photo-1511295742362-92c96b504802?q=80&w=2070&auto=format&fit=crop"
    }
];
</script>

<template>
    <Head title="Inicio - Creciendo Juntos" />

    <PublicLayout>
        <!-- Hero Section -->
        <section class="relative overflow-hidden pt-10 pb-20 lg:pt-20 lg:pb-32">
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary/10 via-background to-background"></div>
            <div class="absolute top-20 right-0 -z-10 opacity-30 blur-3xl">
                <div class="h-96 w-96 rounded-full bg-secondary/30"></div>
            </div>
            
            <div class="container max-w-5xl px-4 md:px-6 mx-auto">
                <div class="grid gap-12 lg:grid-cols-2 lg:gap-12 items-center">
                    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-8 duration-1000 text-center lg:text-left">
                        <div class="inline-flex items-center rounded-full border border-primary/20 bg-primary/5 px-3 py-1 text-sm font-medium text-primary backdrop-blur-sm mx-auto lg:mx-0">
                            <span class="flex h-2 w-2 rounded-full bg-secondary mr-2"></span>
                            Consultorio Virtual
                        </div>
                        <h1 class="text-4xl font-extrabold tracking-tight lg:text-6xl text-foreground">
                            Tu bienestar emocional es el camino hacia <span class="text-primary relative inline-block">
                                tu plenitud
                                <svg class="absolute w-full h-3 -bottom-1 left-0 text-secondary/50 -z-10" viewBox="0 0 100 10" preserveAspectRatio="none">
                                    <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
                                </svg>
                            </span>
                        </h1>
                        <p class="text-lg text-muted-foreground leading-relaxed max-w-xl">
                            Hola, soy Diana Campos Del Carpio. Te acompaño en un espacio seguro y confidencial para explorar tus emociones y potenciar tu crecimiento personal.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <Link href="/contact">
                                <Button size="lg" class="w-full sm:w-auto text-base h-12 px-8 rounded-full shadow-xl shadow-primary/20 hover:shadow-primary/30 transition-all hover:-translate-y-1">
                                    Empezar mi proceso
                                    <ArrowRight class="ml-2 h-5 w-5" />
                                </Button>
                            </Link>
                            <Link href="/about">
                                <Button variant="outline" size="lg" class="w-full sm:w-auto text-base h-12 px-8 rounded-full hover:bg-muted/50">
                                    Conocer más
                                </Button>
                            </Link>
                        </div>
                        <div class="flex items-center gap-4 pt-4 text-sm text-muted-foreground">
                            <div class="flex -space-x-2">
                                <div class="h-8 w-8 rounded-full bg-slate-200 border-2 border-background"></div>
                                <div class="h-8 w-8 rounded-full bg-slate-300 border-2 border-background"></div>
                                <div class="h-8 w-8 rounded-full bg-slate-400 border-2 border-background"></div>
                            </div>
                            <p>Más de <span class="font-bold text-foreground">500+</span> pacientes confían en nosotros</p>
                        </div>
                    </div>
                    
                    <div class="relative lg:ml-auto animate-in fade-in zoom-in duration-1000 delay-200">
                         <!-- Decorative blobs -->
                        <div class="absolute -top-12 -left-12 h-24 w-24 rounded-full bg-secondary/40 blur-2xl animate-pulse"></div>
                        <div class="absolute -bottom-12 -right-12 h-32 w-32 rounded-full bg-primary/30 blur-2xl animate-pulse delay-700"></div>
                        
                        <!-- Main Image Placeholder - Simbolo Psicología -->
                        <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-white bg-white shadow-primary/20 aspect-[4/5] w-full max-w-sm lg:max-w-md mx-auto transform rotate-2 hover:rotate-0 transition-all duration-500 flex items-center justify-center">
                             <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-white to-secondary/5"></div>
                             
                             <!-- Psychology Symbol (Brain + Heart concept) -->
                             <div class="relative z-10 flex flex-col items-center justify-center text-primary/80 transition-transform duration-700 hover:scale-105">
                                <Brain class="h-32 w-32 md:h-48 md:w-48 lg:h-56 lg:w-56 drop-shadow-lg transition-all duration-500" stroke-width="1" />
                                <div class="mt-4 md:mt-8 text-center space-y-2">
                                    <div class="inline-flex items-center justify-center p-2 md:p-3 rounded-full bg-primary/10 mb-2">
                                        <Heart class="h-5 w-5 md:h-6 md:w-6 text-primary fill-primary/20" />
                                    </div>
                                </div>
                             </div>

                             <div class="absolute bottom-4 md:bottom-6 left-0 right-0 z-20 text-center">
                                 <div class="mx-4 md:mx-6 p-3 md:p-4 rounded-xl bg-white/80 backdrop-blur-md border border-primary/10 shadow-lg">
                                     <p class="font-bold text-base md:text-lg text-primary">Psic. Diana Campos</p>
                                     <p class="text-xs md:text-sm text-muted-foreground">Especialista en Terapia Cognitivo Conductual</p>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 bg-muted/30">
            <div class="container px-4 md:px-6 mx-auto">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-foreground sm:text-4xl mb-4">¿Por qué elegir "Creciendo Juntos"?</h2>
                    <p class="text-muted-foreground text-lg">
                        Un enfoque integral diseñado para adaptarme a tus necesidades y ritmo, proporcionándote las herramientas para una vida plena.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <Card class="border-none shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-white">
                        <CardHeader>
                            <div class="h-12 w-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 text-primary">
                                <Heart class="h-6 w-6" />
                            </div>
                            <CardTitle>Empatía y Calidez</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <CardDescription class="text-base">
                                Un trato humano y cercano donde te sentirás escuchado/a sin juicios. Tu comodidad es fundamental para el proceso.
                            </CardDescription>
                        </CardContent>
                    </Card>

                    <Card class="border-none shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-white">
                        <CardHeader>
                            <div class="h-12 w-12 rounded-xl bg-secondary/20 flex items-center justify-center mb-4 text-secondary-foreground">
                                <Shield class="h-6 w-6" />
                            </div>
                            <CardTitle>Espacio Seguro</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <CardDescription class="text-base">
                                Confidencialidad garantizada y un ambiente protegido donde puedes ser tú mismo/a con total libertad.
                            </CardDescription>
                        </CardContent>
                    </Card>

                    <Card class="border-none shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-white">
                        <CardHeader>
                            <div class="h-12 w-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 text-primary">
                                <Sparkles class="h-6 w-6" />
                            </div>
                            <CardTitle>Enfoque Profesional</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <CardDescription class="text-base">
                                Técnicas basadas en evidencia científica y actualización constante para brindarte el mejor acompañamiento.
                            </CardDescription>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </section>

        <!-- Services Preview -->
        <section class="py-20">
             <div class="container px-4 md:px-6 mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                    <div class="max-w-2xl">
                        <span class="text-primary font-semibold mb-2 block uppercase tracking-wider text-sm">Mis Servicios</span>
                        <h2 class="text-3xl font-bold tracking-tight text-foreground sm:text-4xl">
                            ¿Cómo puedo ayudarte?
                        </h2>
                    </div>
                    <Link href="/services">
                        <Button variant="ghost" class="group text-primary">
                            Ver todos los servicios
                            <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                        </Button>
                    </Link>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Service 1 -->
                    <div class="group relative overflow-hidden rounded-2xl bg-white border border-border p-8 hover:border-primary/50 transition-all hover:shadow-lg">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-colors"></div>
                        <Brain class="h-10 w-10 text-primary mb-6" />
                        <h3 class="text-xl font-bold mb-3">Terapia Individual</h3>
                        <p class="text-muted-foreground mb-6">
                            Abordamos ansiedad, depresión, estrés y autoestima en sesiones personalizadas uno a uno.
                        </p>
                        <Link href="/contact" class="inline-flex items-center text-sm font-semibold text-primary hover:underline">
                            Agendar sesión <ArrowRight class="ml-1 h-3 w-3" />
                        </Link>
                    </div>

                    <!-- Service 2 -->
                    <div class="group relative overflow-hidden rounded-2xl bg-white border border-border p-8 hover:border-primary/50 transition-all hover:shadow-lg">
                         <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-primary/5 group-hover:bg-primary/10 transition-colors"></div>
                        <div class="h-10 w-10 text-primary mb-6 flex items-center justify-center">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Terapia de Pareja</h3>
                        <p class="text-muted-foreground mb-6">
                            Mejorar la comunicación, resolver conflictos y fortalecer el vínculo afectivo en la relación.
                        </p>
                         <Link href="/contact" class="inline-flex items-center text-sm font-semibold text-primary hover:underline">
                            Agendar sesión <ArrowRight class="ml-1 h-3 w-3" />
                        </Link>
                    </div>

                    <!-- Service 3 -->
                    <div class="group relative overflow-hidden rounded-2xl bg-white border border-border p-8 hover:border-primary/50 transition-all hover:shadow-lg">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-colors"></div>
                         <div class="h-10 w-10 text-primary mb-6 flex items-center justify-center">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-baby"><path d="M9 12h.01"/><path d="M15 12h.01"/><path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"/><path d="M19 6.3a9 9 0 0 1 1.8 3.9 2 2 0 0 1 0 3.8 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.8A9 9 0 0 1 12 3c2 1 6 3.9 7 3.3"/></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Terapia Infantil</h3>
                        <p class="text-muted-foreground mb-6">
                            Apoyo especializado para niños, ayudándoles a gestionar sus emociones y conductas de forma saludable.
                        </p>
                         <Link href="/contact" class="inline-flex items-center text-sm font-semibold text-primary hover:underline">
                            Agendar sesión <ArrowRight class="ml-1 h-3 w-3" />
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 bg-muted/30 relative overflow-hidden">
             <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] opacity-50"></div>
            <div class="container px-4 md:px-6 mx-auto relative z-10">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-foreground sm:text-4xl mb-4">Lo que dicen mis pacientes</h2>
                    <p class="text-muted-foreground text-lg">
                        Historias reales de personas que han transformado sus vidas a través de la terapia.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div v-for="(testimonial, index) in testimonials" :key="index" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 relative">
                        <Quote class="absolute top-6 right-6 h-8 w-8 text-primary/10" />
                        <div class="flex gap-1 mb-4">
                            <Star v-for="i in 5" :key="i" class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                        </div>
                        <p class="text-muted-foreground mb-6 italic">"{{ testimonial.text }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="h-10 w-10 rounded-full bg-primary/10 flex items-center justify-center font-bold text-primary">
                                {{ testimonial.initial }}
                            </div>
                            <div>
                                <p class="font-semibold text-foreground">{{ testimonial.name }}</p>
                                <p class="text-xs text-muted-foreground">Paciente verificado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20">
            <div class="container max-w-4xl px-4 md:px-6 mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-foreground sm:text-4xl mb-4">Preguntas Frecuentes</h2>
                    <p class="text-muted-foreground text-lg">
                        Respuestas a las dudas más comunes sobre el proceso terapéutico.
                    </p>
                </div>

                <div class="space-y-4">
                    <Collapsible v-for="(faq, index) in faqs" :key="index" class="w-full border rounded-xl bg-white shadow-sm">
                        <CollapsibleTrigger class="flex items-center justify-between w-full p-6 font-medium text-left group">
                            {{ faq.question }}
                            <ChevronDown class="h-5 w-5 text-muted-foreground transition-transform duration-200 group-data-[state=open]:rotate-180" />
                        </CollapsibleTrigger>
                        <CollapsibleContent class="px-6 pb-6 text-muted-foreground">
                            {{ faq.answer }}
                        </CollapsibleContent>
                    </Collapsible>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="py-20 bg-muted/30">
            <div class="container px-4 md:px-6 mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold tracking-tight text-foreground sm:text-4xl mb-4">Recursos para tu Bienestar</h2>
                        <p class="text-muted-foreground text-lg">
                            Artículos y consejos prácticos para acompañarte en tu día a día.
                        </p>
                    </div>
                    <Button variant="outline" class="hidden md:inline-flex group">
                        Ver todos los artículos
                        <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                    </Button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <article v-for="(post, index) in blogPosts" :key="index" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-border group cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <div class="absolute inset-0 bg-primary/10 group-hover:bg-primary/5 transition-colors z-10"></div>
                            <img :src="post.image" :alt="post.title" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute top-4 left-4 z-20">
                                <span class="px-3 py-1 text-xs font-semibold bg-white/90 backdrop-blur-sm text-primary rounded-full shadow-sm">
                                    {{ post.category }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-xs text-muted-foreground mb-3">
                                <div class="flex items-center gap-1">
                                    <Calendar class="h-3 w-3" />
                                    {{ post.date }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <Clock class="h-3 w-3" />
                                    {{ post.readTime }}
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors line-clamp-2">
                                {{ post.title }}
                            </h3>
                            <p class="text-muted-foreground text-sm line-clamp-3 mb-4">
                                {{ post.excerpt }}
                            </p>
                            <div class="flex items-center text-primary font-medium text-sm">
                                Leer más <ArrowUpRight class="ml-1 h-4 w-4" />
                            </div>
                        </div>
                    </article>
                </div>
                <div class="mt-8 text-center md:hidden">
                    <Button variant="outline" class="w-full">
                        Ver todos los artículos
                    </Button>
                </div>
            </div>
        </section>

        <!-- Final CTA Section -->
        <section class="py-24 bg-primary text-primary-foreground relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
             <!-- Decorative circles -->
            <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-64 h-64 bg-secondary/20 rounded-full blur-3xl"></div>
            
            <div class="container px-4 md:px-6 mx-auto text-center relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 tracking-tight">¿Listo/a para dar el primer paso?</h2>
                <p class="text-xl text-primary-foreground/90 max-w-2xl mx-auto mb-10 leading-relaxed">
                    No tienes que recorrer este camino en soledad. Agenda tu primera cita y empecemos a trabajar en tu bienestar hoy mismo.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <Link href="/contact">
                        <Button size="lg" variant="secondary" class="h-14 px-8 text-lg rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all">
                            Agendar mi Cita Ahora
                            <ArrowRight class="ml-2 h-5 w-5" />
                        </Button>
                    </Link>
                    <Link href="/services">
                        <Button size="lg" variant="outline" class="h-14 px-8 text-lg rounded-full border-primary-foreground/20 text-primary-foreground hover:bg-primary-foreground/10 hover:text-white">
                            Ver Servicios
                        </Button>
                    </Link>
                </div>
                <p class="mt-8 text-sm text-primary-foreground/60 flex items-center justify-center gap-2">
                    <CheckCircle2 class="h-4 w-4" />
                    Primera consulta de evaluación disponible
                </p>
            </div>
        </section>


    </PublicLayout>
</template>
