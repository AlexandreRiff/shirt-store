<section class="py-24 bg-[hsl(0,0%,96%)]">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-[hsl(0,0%,4%)] mb-12">O Que Dizem Nossos Clientes</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($testimonials as $index => $testimonial)
                <div class="bg-white p-6 rounded-lg space-y-4 animate-fade-in"
                    style="animation-delay: {{ $index * 0.1 }}s;">
                    {{-- Stars --}}
                    <div class="flex gap-1">
                        @for ($i = 0; $i < $testimonial['rating']; $i++)
                            <svg class="h-4 w-4 fill-current text-yellow-500" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        @endfor
                    </div>

                    {{-- Comment --}}
                    <p class="text-[hsl(0,0%,45%)]">{{ $testimonial['text'] }}</p>

                    {{-- Name --}}
                    <p class="font-semibold text-[hsl(0,0%,4%)]">{{ $testimonial['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
