<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import { Button } from '@/components/ui/button';
import { 
  Sheet, 
  SheetContent, 
  SheetTrigger,
  SheetClose 
} from '@/components/ui/sheet';
import { Menu, Instagram, Facebook, Mail, Phone, MapPin } from 'lucide-vue-next';

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > 20;
};

const handleResize = () => {
  if (window.innerWidth >= 768) {
    isMobileMenuOpen.value = false;
  }
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
  window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
  window.removeEventListener('resize', handleResize);
});

const navLinks = [
  { name: 'Inicio', href: '/' },
  { name: 'Sobre Mí', href: '/about' },
  { name: 'Servicios', href: '/services' },
  { name: 'Contacto', href: '/contact' },
];
</script>

<template>
  <div class="flex min-h-screen flex-col bg-background font-sans text-foreground selection:bg-primary/20 selection:text-primary relative">
    <!-- Navbar Fixed -->
    <header 
      class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-transparent"
      :class="{ 'bg-white/80 backdrop-blur-md shadow-sm border-border/40 py-2': isScrolled, 'bg-transparent py-4': !isScrolled }"
    >
      <div class="container mx-auto px-4 md:px-6 flex items-center justify-between">
        <!-- Logo -->
        <Link href="/" class="flex items-center gap-3 group">
          <div class="flex h-12 w-12 md:h-14 md:w-14 items-center justify-center rounded-full overflow-hidden bg-white shadow-sm transition-transform group-hover:scale-105">
             <img src="/logo-creciendo-juntos.png" alt="Creciendo Juntos Logo" class="h-full w-full object-cover" />
          </div>
          <div class="flex flex-col">
            <span class="font-bold text-lg md:text-xl leading-none text-primary tracking-tight">Creciendo Juntos</span>
            <span class="text-[10px] md:text-xs text-muted-foreground uppercase tracking-widest font-medium">Psic. Diana Campos</span>
          </div>
        </Link>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-8">
          <Link 
            v-for="link in navLinks" 
            :key="link.href" 
            :href="link.href"
            class="text-sm font-medium text-muted-foreground transition-colors hover:text-primary relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-secondary after:transition-all hover:after:w-full"
            :class="{ 'text-primary font-semibold after:w-full': $page.url === link.href }"
          >
            {{ link.name }}
          </Link>
        </nav>

        <!-- Actions -->
        <div class="hidden md:flex items-center gap-4">
           <Link v-if="!$page.props.auth?.user" href="/login">
            <Button variant="ghost" class="font-medium hover:text-primary hover:bg-primary/5">
              Iniciar Sesión
            </Button>
           </Link>
           <Link v-else href="/dashboard">
            <Button variant="ghost" class="font-medium hover:text-primary hover:bg-primary/5">
              Mi Panel
            </Button>
           </Link>
           <Link href="/contact">
             <Button class="rounded-full px-6 shadow-lg shadow-primary/20 hover:shadow-primary/30 transition-all hover:-translate-y-0.5">
                Agendar Cita
             </Button>
           </Link>
        </div>

        <!-- Mobile Menu -->
        <Sheet v-model:open="isMobileMenuOpen">
          <SheetTrigger as-child>
            <Button variant="ghost" size="icon" class="md:hidden">
              <Menu class="h-6 w-6 text-primary" />
              <span class="sr-only">Abrir menú</span>
            </Button>
          </SheetTrigger>
          <SheetContent side="top" class="w-full border-b-0 shadow-2xl rounded-b-[2rem]" overlay-class="bg-transparent backdrop-blur-none">
            <div class="flex flex-col h-full py-8 px-6 max-w-sm mx-auto">
              <div class="flex items-center justify-center gap-3 mb-8">
                 <div class="flex h-12 w-12 items-center justify-center rounded-full overflow-hidden bg-white shadow-sm">
                    <img src="/logo-creciendo-juntos.png" alt="Logo" class="h-full w-full object-cover" />
                 </div>
                 <span class="font-bold text-lg text-primary">Creciendo Juntos</span>
              </div>
              
              <nav class="flex flex-col gap-4 mb-8 items-center text-center">
                <Link 
                  v-for="link in navLinks" 
                  :key="link.href" 
                  :href="link.href"
                  class="text-lg font-medium transition-colors hover:text-primary py-2 border-b-2 border-transparent w-fit"
                  :class="{ 'text-primary font-bold border-primary': $page.url === link.href, 'text-muted-foreground': $page.url !== link.href }"
                >
                  {{ link.name }}
                </Link>
              </nav>

              <div class="flex flex-col gap-4 mt-auto items-center w-full">
                 <Link v-if="!$page.props.auth?.user" href="/login" class="w-full sm:w-auto">
                  <Button variant="outline" class="w-full sm:w-64 justify-center rounded-full h-12 text-base">
                    Iniciar Sesión
                  </Button>
                 </Link>
                 <Link v-else href="/dashboard" class="w-full sm:w-auto">
                  <Button variant="outline" class="w-full sm:w-64 justify-center rounded-full h-12 text-base">
                    Mi Panel
                  </Button>
                 </Link>
                 <Link href="/contact" class="w-full sm:w-auto">
                   <Button class="w-full sm:w-64 justify-center rounded-full h-12 text-base shadow-lg shadow-primary/20">
                      Agendar Cita
                   </Button>
                 </Link>
              </div>
            </div>
          </SheetContent>
        </Sheet>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 pt-[72px] md:pt-[88px]">
      <slot />
    </main>

    <!-- Floating Action Buttons -->
    <div class="fixed bottom-6 right-6 z-40 flex flex-col gap-4 animate-in slide-in-from-right-8 duration-700 delay-500">
      <!-- WhatsApp -->
      <a 
        href="https://wa.me/51999999999" 
        target="_blank" 
        rel="noopener noreferrer"
        class="flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg shadow-green-500/30 transition-all duration-300 hover:-translate-y-1 hover:scale-110 hover:shadow-green-500/50 group"
        title="Contáctanos por WhatsApp"
      >
        <svg viewBox="0 0 24 24" class="h-8 w-8 fill-current transition-transform group-hover:rotate-12" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
      </a>
      
      <!-- Mail -->
      <a 
        href="mailto:contacto@creciendojuntos.com" 
        class="flex h-12 w-12 items-center justify-center rounded-full bg-secondary text-secondary-foreground shadow-lg shadow-secondary/30 transition-all duration-300 hover:-translate-y-1 hover:scale-110 hover:shadow-secondary/50 group"
        title="Envíanos un correo"
      >
        <Mail class="h-6 w-6 transition-transform group-hover:scale-110" />
      </a>
    </div>

    <!-- Footer -->
    <footer class="bg-muted/50 border-t border-border mt-auto">
      <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12">
          <!-- Brand -->
          <div class="space-y-4 md:col-span-1">
            <Link href="/" class="flex items-center gap-2">
              <img src="/logo-creciendo-juntos.png" alt="Logo" class="h-8 w-8" />
              <span class="font-bold text-lg text-primary">Creciendo Juntos</span>
            </Link>
            <p class="text-sm text-muted-foreground leading-relaxed">
              Acompañándote en tu proceso de crecimiento personal y bienestar emocional. Espacio seguro y profesional.
            </p>
            <div class="flex gap-4 pt-2">
               <a href="#" class="text-muted-foreground hover:text-primary transition-colors"><Instagram class="h-5 w-5" /></a>
               <a href="#" class="text-muted-foreground hover:text-primary transition-colors"><Facebook class="h-5 w-5" /></a>
            </div>
          </div>
          
          <!-- Links -->
          <div class="md:col-span-1">
             <h3 class="font-semibold mb-4 text-foreground">Enlaces Rápidos</h3>
             <ul class="space-y-2 text-sm text-muted-foreground">
                <li><Link href="/" class="hover:text-primary transition-colors">Inicio</Link></li>
                <li><Link href="/about" class="hover:text-primary transition-colors">Sobre Mí</Link></li>
                <li><Link href="/services" class="hover:text-primary transition-colors">Servicios</Link></li>
                <li><Link href="/contact" class="hover:text-primary transition-colors">Contacto</Link></li>
             </ul>
          </div>

          <!-- Services -->
          <div class="md:col-span-1">
             <h3 class="font-semibold mb-4 text-foreground">Servicios</h3>
             <ul class="space-y-2 text-sm text-muted-foreground">
                <li><Link href="/services" class="hover:text-primary transition-colors">Terapia Individual</Link></li>
                <li><Link href="/services" class="hover:text-primary transition-colors">Terapia de Pareja</Link></li>
                <li><Link href="/services" class="hover:text-primary transition-colors">Terapia Infantil</Link></li>
                <li><Link href="/services" class="hover:text-primary transition-colors">Talleres</Link></li>
             </ul>
          </div>

          <!-- Contact -->
          <div class="md:col-span-1">
             <h3 class="font-semibold mb-4 text-foreground">Contacto</h3>
             <ul class="space-y-3 text-sm text-muted-foreground">
                <li class="flex items-start gap-3">
                   <MapPin class="h-4 w-4 mt-0.5 text-primary" />
                   <span>Av. Ejemplo 123, Oficina 404<br>Lima, Perú</span>
                </li>
                <li class="flex items-center gap-3">
                   <Phone class="h-4 w-4 text-primary" />
                   <span>+51 999 999 999</span>
                </li>
                <li class="flex items-center gap-3">
                   <Mail class="h-4 w-4 text-primary" />
                   <span>contacto@creciendojuntos.com</span>
                </li>
             </ul>
          </div>
        </div>
        
        <div class="border-t border-border mt-12 pt-8 text-center text-xs text-muted-foreground">
           <p>&copy; {{ new Date().getFullYear() }} Creciendo Juntos - Psic. Diana Campos. Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>
  </div>
</template>
