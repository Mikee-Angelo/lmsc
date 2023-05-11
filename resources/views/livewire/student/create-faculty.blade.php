<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmFacultyCreate'>
        {{ __('Add Faculty') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingFacultyCreate">
            <x-slot name="title">
                {{ __('Add New Faculty') }}
            </x-slot>

            <x-slot name="content">

                {{-- Student Number --}}
                <div>
                    <x-input-label for="student_number" :value="__('ID Number')" />
                    <x-text-input id="student_number" type="text" class="block w-full mt-1"
                        :value="old('studentIds.student_number', $studentIds->student_number)" wire:model="studentIds.student_number" required />
                    <x-input-error class="mt-2" for="studentIds.student_number" />
                </div>

                {{-- Name --}}
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" class="block w-full mt-1" :value="old('student.name', $student->name)"
                        wire:model="student.name" required />
                    <x-input-error class="mt-2" for="student.name" />
                </div>

                {{-- Course --}}
                <div class="mt-4">
                    <x-input-label for="course" :value="__('Department')" />
                    <x-text-input id="course" type="text" class="block w-full mt-1" :value="old('student.course', $student->course)"
                        wire:model="student.course" required />
                    <x-input-error class="mt-2" for="student.course" />
                </div>

                {{-- Level --}}
                <div class="mt-4">
                    <x-input-label for="level" :value="__('Level')" />
                    <x-text-input id="level" type="text" class="block w-full mt-1" :value="old('student.level', $student->level)"
                        wire:model="student.level" required />
                    <x-input-error class="mt-2" for="student.level" />
                </div>

                {{-- School Year --}}
                <div class="mt-4">
                    <x-input-label for="school_year" :value="__('School Year')" />
                    <x-text-input id="school_year" type="text" class="block w-full mt-1" :value="old('student.school_year', $student->school_year)"
                        wire:model="student.school_year" required />
                    <x-input-error class="mt-2" for="student.school_year" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingFacultyCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Add') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>