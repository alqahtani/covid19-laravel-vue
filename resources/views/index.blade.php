<x-layouts.app>
  <div class="mb-6">
    <div class="bg-gray-300 flex items-center justify-center" style="height: 450px">
      <h1>Map</h1>
    </div>
  </div>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Country
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Today Cases
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Deaths
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Today Deaths
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Recovered
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Active Cases
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Critical Cases
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Case per Million
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Death per Million
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Total Tests
                </th>
                <th
                  class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Test per Million
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

              @foreach ($allCountries as $country)
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="w-10" src="{{ $country->flag }}" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm leading-5 font-medium text-gray-900">
                        {{ $country->country }}
                      </div>
                      <div class="text-sm leading-5 text-gray-500">
                        All cases: {{ $country->cases }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->todayCases }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->deaths }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->todayDeaths }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->recovered }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->active }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->critical }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->casesPerOneMillion }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->deathsPerOneMillion }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->totalTests }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">{{ $country->testsPerOneMillion }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</x-layouts.app>