<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
            <h2 class="text-center text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Frequently asked questions
            </h2>

            <div class="bg-white max-w-xl mx-auto border border-gray-200 mt-6 space-y-6 divide-y divide-gray-200" x-data="{selected:null}">
                <ul class="shadow-box">

                    <li class="relative border-b border-gray-200">

                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                            <div class="flex items-center justify-between">
					            <span>Should I use reCAPTCHA v2 or v3?</span>
                                <span class="ml-6 h-7 flex items-center">
                                    <svg class="rotate-0 h-6 w-6 transform"
                                         xmlns="http://www.w3.org/2000/svg" f
                                         ill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         aria-hidden="true">
                                      <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                              </span>
                            </div>
                        </button>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                             style=""
                             x-ref="container1"
                             x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>reCAPTCHA v2 is not going away! We will continue to fully support and improve
                                    security and usability for v2.
                                </p>
                                <p>reCAPTCHA v3 is intended for power users, site owners that want more data about
                                    their traffic, and for use cases in which it is not appropriate to show a challenge
                                    to the user.
                                </p>
                                <p>For example, a registration page might still use reCAPTCHA v2 for a higher-friction
                                    challenge, whereas more common actions like sign-in, searches, comments, or voting
                                    might use reCAPTCHA v3. To see more details, see the reCAPTCHA v3 developer guide.
                                </p>
                            </div>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
