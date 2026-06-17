<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
    <div class="md:mb-4 mb-3 lg:mb-6">
        <h1 class="text-center text-xl md:text-2xl lg:text-3xl font-bold text-gray-900">Book a Free Consultation</h1>
    </div>
    <form action="" class="border border-gray-200 p-6 w-full lg:max-w-3xl mx-auto rounded-lg">
       <div class="flex flex-col gap-4">
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-form.input-text name="name" label="Full Name" value=""
                placeholder="Enter Full Name..." />
            <x-form.input-text name="email" label="Email" type="email" value="" placeholder="Enter Email..." />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-form.input-text name="phone" label="Phone" value=""  placeholder="Enter Phone No..."/>
            <x-form.select-input name="course" label="Course" value="" :options="[
                                'course 1' => 'Course 1',
                                'course 2' => 'Course 2',
                            ]" />
            
        </div>
        <x-form.textarea-input name="note" label="Note" rows="3" placeholder="Write your note..." />
       </div>

        <div class="flex justify-end mt-4 md:mt-6">
            <button type="button"
                class=" text-sm   bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-normal hover:bg-brand-600 transition">
                Book Consultation
            </button>
        </div>
    </form>
</div>
