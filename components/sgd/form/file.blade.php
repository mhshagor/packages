<div
    x-data="fileUploader()"
    class="w-full max-w-xl"
>

    <div
        class="border-2 border-dashed rounded-xl p-6 text-center cursor-pointer"
        @click="$refs.input.click()"
    >

        <input
            type="file"
            x-ref="input"
            :multiple="multiple"
            class="hidden"
            @change="handleFiles($event.target.files)"
        >

        <p class="text-sm text-gray-600">
            Select file<span x-show="multiple">s</span>
        </p>
    </div>

    <div class="mt-4 space-y-3">

        <template
            x-for="(file,index) in files"
            :key="file.id"
        >
            <div class="flex items-center gap-3 bg-gray-100 p-2 rounded">

                <img
                    x-show="file.preview"
                    :src="file.preview"
                    class="w-14 h-14 object-cover rounded"
                />

                <div class="flex-1">
                    <p
                        class="text-sm truncate"
                        x-text="file.name"
                    ></p>

                    <!-- Animated Progress -->
                    <div class="w-full h-2 bg-gray-300 rounded overflow-hidden mt-1">
                        <div
                            class="h-2 bg-blue-500 transition-all duration-300 relative"
                            :style="`width:${file.progress}%`"
                        >

                            <div class="absolute inset-0 animate-pulse bg-white/30"></div>

                        </div>
                    </div>

                </div>

                <button
                    class="text-red-500 text-xs"
                    @click="remove(index)"
                >Remove</button>

            </div>
        </template>

    </div>
</div>
