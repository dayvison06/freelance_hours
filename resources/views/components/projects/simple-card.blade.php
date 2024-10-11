@props(['project'])

<x-ui.card class="col-span-2 ">
    <div class="flex items-start justify-between pb-4">
        <div class="flex flex-col gap-[16px]">
            <div>
                @if($project->status->label() == 'Aceitando propostas')
                    <span
                        class="bg-[#C0F7B4] text-[#1D8338] rounded-full font-bold text-center uppercase py-[6px] px-[14px] text-[12px] tracking-wide ">
                    {{ $project->status->label() }}
                </span>
                @else
                    <span
                        class="bg-[#FECDD3] text-[#881337] rounded-full font-bold text-center uppercase py-[6px] px-[14px] text-[12px] tracking-wide ">
                    {{ $project->status->label() }}
                </span>
                @endif
            </div>
            <h1 class="text-[28px] text-white leading-9">
                {{ $project->title }}
            </h1>
            <div>
                <div class="text-[#8C8C9A] text-[14px] leading-6">
                    Publicado {{ $project->created_at->diffForHumans() }}
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between text-[14px]">
            <div class="text-[#8C8C9A] font-bold leading-6 mr-3">Encerra em:</div>
            <div class="font-bold flex items-center space-x-1">
                <span
                    class="text-white rounded-md bg-[#5354fd] shadow-md shadow-[#5354fd] py-1 px-1 border border-transparent">01</span><span>:</span>
                <span
                    class="text-white rounded-md bg-[#5354fd] shadow-md shadow-[#5354fd] py-1 px-1 border border-transparent">12</span><span>:</span>
                <span
                    class="text-white rounded-md bg-[#5354fd] shadow-md shadow-[#5354fd] py-1 px-1 border border-transparent">26</span><span>:</span>
                <span
                    class="text-white rounded-md bg-[#5354fd] shadow-md shadow-[#5354fd] py-1 px-1 border border-transparent">64</span>
            </div>
        </div>
    </div>
    <div class="py-4 space-y-4 border-none">
        <div class="uppercase font-bold text-[#8C8C9A] text-[12px]">Tecnologias</div>
        <div class="flex gap-[8px] items-center pb-2">
            @foreach($project->tech_stack as $tech)
                <x-ui.tech :icon="$tech" :text="$tech"/>
            @endforeach
        </div>
    </div>

    <div class="pt-4 space-y-4 border-none">
        <div class="uppercase font-bold text-[#8C8C9A] text-[12px]">Publicado Por</div>
        <div class="flex gap-[8px] items-center">
            <div>
                <x-ui.avatar src="{{ $project->author->avatar }}"/>
            </div>

            <div>
                <div class="text-white text-[14px] font-bold tracking-wide">
                    {{ $project->author->name }}
                </div>
                <div class="flex items-center space-x-[4px]">
                    @foreach(range(1, $project->author->stars) as $star)
                        <x-ui.icons.star class="h-[14px]"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-ui.card>
