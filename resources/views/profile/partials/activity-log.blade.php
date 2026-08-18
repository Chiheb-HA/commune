<div>
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Recent activity') }}</h3>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Your last 10 activities') }}</p>

    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Date') }}</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Action') }}</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('IP') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($activityLogs as $log)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{ $log->created_at }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{ $log->action }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{ $log->ip_address }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-sm text-gray-500">{{ __('No activity yet.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6">
    <h3 class="text-lg font-medium text-gray-900">{{ __('Activity Log') }}</h3>
    
    <div class="mt-4 overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Date/Time') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Action') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('IP Address') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($activityLogs as $log)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $log->action }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $log->ip_address }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                {{ __('No activity recorded yet.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
