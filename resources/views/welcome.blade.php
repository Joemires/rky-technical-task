<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 py-8 px-4">
        <div class="max-w-4xl mx-auto" x-data="jobSearch()">
            <!-- Search Form -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h1 class="text-2xl font-bold mb-4">Search Job Listings</h1>
                <form @submit.prevent="query" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" x-model="filters.title" placeholder="Job Title" class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <input type="text" x-model="filters.location" placeholder="Location" class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <input type="text" x-model="filters.category" placeholder="Category" class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex items-center gap-2.5">
                        <button type="submit" x-bind:disabled="loading"
                            class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition">
                            Search <span x-text="`(${pagination.total})`"></span>
                        </button>

                        <button type="button" x-bind:disabled="loading"
                            x-on:click="() => { filters = { title: '', location: '', category: '' }; query() }"
                            class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 transition"> Reset </button>
                    </div>
                </form>
            </div>

            <!-- Results -->
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="jobs.length > 0">
                <h2 class="text-xl font-bold mb-1 pb-2 border-b-4 border-blue-500">Job Listings</h2>
                <template x-for="job in jobs" :key="job.id">
                    <div class="border-b border-gray-200 py-4">
                        <h3 class="text-lg font-semibold" x-text="job.title"></h3>
                        <p class="text-gray-600"><span x-text="job.location"></span> - <span x-text="job.category"></span></p>
                        <p class="mt-2" x-text="job.description"></p>
                        <p class="mt-2 text-gray-500">Company: <span x-text="job.company"></span></p>
                        <p class="text-gray-500 mt-0.5">
                            Salary: <span x-text="new Intl.NumberFormat('en-US', {style: 'currency', currency: job.currency}).format(job.salary)"></span>
                        </p>
                    </div>
                </template>

                <!-- Pagination Controls -->
                <div class="flex justify-between items-center mt-6" x-show="pagination.total > pagination.per_page">
                    <button @click="page(1)" :disabled="pagination.current_page === 1"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition disabled:bg-gray-100 disabled:cursor-not-allowed hidden">First</button>

                    <button @click="page(pagination.current_page - 1)" :disabled="pagination.current_page === 1"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition disabled:bg-gray-100 disabled:cursor-not-allowed">Previous</button>

                    <span class="text-gray-700">Page <span x-text="pagination.current_page"></span> of <span
                            x-text="pagination.last_page"></span></span>

                    <button @click="page(pagination.current_page + 1)"
                        :disabled="pagination.current_page === pagination.last_page"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition disabled:bg-gray-100 disabled:cursor-not-allowed">Next</button>

                    <button @click="page(pagination.last_page)"
                        :disabled="pagination.current_page === pagination.last_page"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition disabled:bg-gray-100 disabled:cursor-not-allowed hidden">Last</button>
                </div>
            </div>

            <!-- No Results Message -->
            <p class="text-center text-gray-500 mt-6" x-show="jobs.length === 0 && !loading">No jobs found.</p>
        </div>

        <script>
            function jobSearch() {
                return {
                    loading: false,
                    jobs: [],
                    filters: {
                        title: '',
                        location: '',
                        category: ''
                    },
                    pagination: {
                        total: 0,
                        per_page: 10,
                        current_page: 1,
                        last_page: 1
                    },
                    init: function () {
                        this.query()
                    },
                    query: async function (page = 1) {
                        this.loading = true;

                        const query = new URLSearchParams({...this.filters, page: page}).toString();
                        const response = await fetch(`/api/jobs?${query}`);
                        const data = await response.json();

                        this.jobs = data.data;

                        this.pagination = {
                            total: data.total,
                            per_page: data.per_page,
                            last_page: data.last_page,
                            current_page: page,
                        };

                        this.loading = false;
                    },
                    page: function (page) {
                        if (page >= 1 && page <= this.pagination.last_page) {
                            this.query(page);
                        }
                    }
                }
            }
        </script>
    </body>
</html>
