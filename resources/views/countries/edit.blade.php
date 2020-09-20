<x-layouts.app>
  <div class="mt-10 sm:mt-10 sm:w-8/12 sm:mx-auto">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <a href="{{ route('index') }}"
            class="text-blue-500 text-sm mb-2 inline-block hover:text-blue-700 flex items-center">
            <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                clip-rule="evenodd" />
            </svg>
            Home</a>
          <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Country</h3>
          <p class="mt-1 text-sm leading-5 text-gray-600">
            Edit the details of {{ $country->country }}.
          </p>
          <p>
            <img src="{{ $country->flag }}" class="mt-2 h-8" />
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        @if (session('status'))
        <div class="rounded-md border border-blue-400 bg-blue-50 p-4 mb-2">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                  d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                  clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3 flex-1">
              <p class="text-sm leading-5 text-blue-700">
                {{ session('status') }}
              </p>
            </div>
          </div>
        </div>
        @endif
        <form action="{{ route('countries.update', $country) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                  <label for="country_name" class="block text-sm font-medium leading-5 text-gray-700">Country
                    Name</label>
                  <input disabled id="country_name" name="country" value="{{ old('country', $country->country ) }}"
                    class="mt-1 text-gray-400 form-input block w-full py-2 px-3 border border-gray-300 @error('country') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('country')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="cases" class="block text-sm font-medium leading-5 text-gray-700">Cases</label>
                  <input id="cases" name="cases" type="number" value="{{ old('cases', $country->cases ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('cases') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('cases')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="todayCases" class="block text-sm font-medium leading-5 text-gray-700">Today Cases: <span
                      class="text-xs text-indigo-600 bg-indigo-100 px-1 border-indigo-400 border rounded inline-block">as
                      last updated on: {{ $country->updated_at->format('l, d F Y') }}</span></label>
                  <input id="todayCases" name="todayCases" type="number"
                    value="{{ old('todayCases', $country->todayCases ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('todayCases') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('todayCases')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>


                <div class="col-span-6 sm:col-span-3">
                  <label for="deaths" class="block text-sm font-medium leading-5 text-gray-700">Deaths</label>
                  <input id="deaths" name="deaths" type="number" value="{{ old('deaths', $country->deaths ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('deaths') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('deaths')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="todayDeaths" class="block text-sm font-medium leading-5 text-gray-700">Today
                    Deaths: <span
                      class="text-xs text-indigo-600 bg-indigo-100 px-1 border-indigo-400 border rounded inline-block">as
                      last updated on: {{ $country->updated_at->format('l, d F Y') }}</span></label>
                  <input id="todayDeaths" name="todayDeaths" type="number"
                    value="{{ old('todayDeaths', $country->todayDeaths ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('todayDeaths') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('todayDeaths')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="recovered" class="block text-sm font-medium leading-5 text-gray-700">Recovered</label>
                  <input id="recovered" name="recovered" type="number"
                    value="{{ old('recovered', $country->recovered ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('recovered') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('recovered')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="active" class="block text-sm font-medium leading-5 text-gray-700">Active Cases</label>
                  <input id="active" name="active" type="number" value="{{ old('active', $country->active ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('active') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('active')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="critical" class="block text-sm font-medium leading-5 text-gray-700">Critical Cases</label>
                  <input id="critical" name="critical" type="number" value="{{ old('critical', $country->critical ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('critical') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('critical')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="cpm" class="block text-sm font-medium leading-5 text-gray-700">Case per Million</label>
                  <input id="cpm" name="cpm" type="number" value="{{ old('cpm', $country->casesPerOneMillion ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('cpm') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('cpm')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="dpm" class="block text-sm font-medium leading-5 text-gray-700">Death per Million</label>
                  <input id="dpm" name="dpm" type="number" value="{{ old('dpm', $country->deathsPerOneMillion ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('dpm') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('dpm')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="totalTests" class="block text-sm font-medium leading-5 text-gray-700">Total Tests</label>
                  <input id="totalTests" name="totalTests" type="number"
                    value="{{ old('totalTests', $country->totalTests ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('totalTests') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('totalTests')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="tpm" class="block text-sm font-medium leading-5 text-gray-700">Test per Million</label>
                  <input id="tpm" name="tpm" type="number" value="{{ old('tpm', $country->testsPerOneMillion ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('tpm') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('tpm')
                  <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                  @enderror
                </div>

              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                Update
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-layouts.app>