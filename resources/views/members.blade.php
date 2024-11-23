<x-layout>
    <x-slot name="headtitle">{{ $headtitle }}</x-slot>
    <div class="text-lg font-bold">
        <h1>MEMBERS</h1>
    </div>
    <div class="px-4 py-6">
        <x-button-add>
            <x-slot:route>{{ route('members.create') }}</x-slot:route>

            Add Member
        </x-button-add>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($members as $member)
            <div class="bg-gray-100 p-4 rounded-md shadow-md flex justify-between items-center">
                <h2 class="text-lg font-semibold">{{ $member['name'] }}</h2>
                <div class="flex space-x-2">
                    <x-button-edit>
                        <x-slot:route>{{ route('members.edit', $member->id) }}</x-slot:route>
                    </x-button-edit>
                    <x-button-delete>
                        <x-slot:route>{{ route('members.destroy', $member->id) }}</x-slot:route>
                        <x-slot:item>member</x-slot:item>
                    </x-button-delete>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>
