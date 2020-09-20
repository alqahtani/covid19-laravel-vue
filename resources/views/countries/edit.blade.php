<x-layouts.app>
  <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
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
                  <label for="today_cases" class="block text-sm font-medium leading-5 text-gray-700">Cases
                    Today: <span
                      class="text-xs text-indigo-600 bg-indigo-100 px-1 border-indigo-400 border rounded inline-block">{{ now()->format('l, d F Y') }}</span></label>
                  <input id="today_cases" name="today_cases" type="number"
                    value="{{ old('today_cases', $country->todayCases ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('today_cases') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('today_cases')
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
                  <label for="total_tests" class="block text-sm font-medium leading-5 text-gray-700">Total Tests</label>
                  <input id="total_tests" name="total_tests" type="number"
                    value="{{ old('total_tests', $country->totalTests ) }}"
                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 @error('total_tests') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  @error('total_tests')
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