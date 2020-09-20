<x-layouts.app>
  <div class="p-10 sm:h-full sm:flex sm:flex-col sm:justify-center sm:px-0 sm:w-8/12 sm:mx-auto">
    <div class="">
      <p>
        <a href="{{ route('index') }}"
          class="text-blue-500 text-md mb-2 inline-block hover:text-blue-700 flex items-center">
          <svg class="h-6 w-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
              clip-rule="evenodd" />
          </svg>
          Home</a>
      </p>
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
          <div class="flex items-center">
            <div class="mr-6">
              <img src="{{ $country->flag }}" class="h-16">
            </div>
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $country->country }}
              </h3>
              <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-600">
                Last update: <span class="text-gray-400">{{ $country->updated_at->diffForHumans() }}.</span>
              </p>
            </div>
          </div>
          <div class="space-x-2">
            <a href="{{ route('countries.edit', $country) }}"
              class="bg-blue-600 hover:bg-blue-700 py-2 px-5 rounded text-white">Edit</a>
            <form class="inline" action="{{ route('countries.delete', $country) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="text-red-500 hover:text-red-700 text-sm leading-5 font-medium">Delete</button>
            </form>
          </div>
        </div>
        <div class="px-4 py-5 sm:p-0">
          <dl>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                All Cases
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->cases) }}&nbsp;&nbsp;<span
                  class="block sm:inline text-gray-400 italic font-normal">
                  {{ ucfirst(Terbilang::make($country->cases)) }}</span>
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Today Cases
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->todayCases) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Deaths
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->deaths) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Today Deaths
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->todayDeaths) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Recovered Cases
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->recovered) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Active Cases
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->active) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Critical Cases
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->critical) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Cases per One Million
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->casesPerOneMillion) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Deaths per One Million
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->deathsPerOneMillion) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Total Tests
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->totalTests) }}
              </dd>
            </div>

            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
              <dt class="text-sm leading-5 font-medium text-gray-500">
                Test per One Million
              </dt>
              <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                {{ number_format($country->testsPerOneMillion) }}
              </dd>
            </div>


          </dl>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>