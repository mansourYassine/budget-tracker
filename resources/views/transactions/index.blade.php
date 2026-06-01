<x-layouts.app>
    <x-slot:title>Transactions</x-slot:title>
    <div class=" flex flex-col px-5 pt-5 gap-3">
        <div class="bg-white shadow-md/5 rounded-2xl w-full flex flex-col md:flex-row items-center justify-center gap-4 md:gap-5 lg:gap-18 py-10">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute top-[50%] translate-y-[-50%] left-2 text-gray-500"></i>
                <input type="search" id="search-transactions" placeholder="Search transactions..." class=" text-lg border border-gray-400 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-9 py-5.5 md:w-70 lg:w-85">
            </div>
            <div class="flex items-center gap-3">
                <label class="text-lg">Type:</label>
                <select name="type" id="transactions-type" class=" border border-gray-400 bg-backgr rounded-md h-11.5 pl-2 focus:outline-none w-30">
                    <option value="all" selected>All</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="flex items-center gap-3">
                <label class="text-lg">Due:</label>
                <select name="type" id="transactions-date" class=" border border-gray-400 bg-backgr rounded-md h-11.5 pl-2 focus:outline-none w-30">
                    <option value="all" selected>All</option>
                    <option value="today">Today</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                </select>
            </div>
        </div>
        <a href="{{ route('transactions.create') }}" class=" bg-secondary text-white text-center border border-gray-300 shadow-md/5 font-semibold px-3 py-2.5 md:px-5 md:py-3 rounded-md self-end">Create Transaction</a>
        <div class=" overflow-x-auto w-full">
            <table class=" w-full rounded-sm overflow-hidden mb-7 px-4 bg-white shadow-md/5 ">
                <thead class=" bg-blue-200 text-gray-500">
                    <tr class=" text-left *:p-4">
                        <th class=" min-w-35">Date</th>
                        <th class=" min-w-50">Title</th>
                        <th class=" min-w-29">Income</th>
                        <th class=" min-w-29">Expense</th>
                        <th class=" min-w-25">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script>
            let transactions = @json($transactions);
            sortTransactions(transactions);

            render(transactions);
            
            // Render transactions from the array
            function render(transactions) {
                let tbody = document.querySelector('table > tbody');
                tbody.innerHTML = "";
                for (let transaction of transactions) {
                    // Create a row
                    let row = document.createElement('tr');
                    row.classList.add("text-lg", '*:p-5', 'not-last:border-b', 'not-last:border-gray-500/25');

                    // Create a cells
                    // Date:
                    let date = document.createElement('td');
                    // Title
                    let title = document.createElement('td');
                    title.classList.add('font-semibold', 'text-gray-700');
                    // Income
                    let income = document.createElement('td');
                    income.classList.add('font-semibold', 'text-xl', 'text-green-600');
                    // Expense
                    let expense = document.createElement('td');
                    expense.classList.add('font-semibold', 'text-xl', 'text-red-600');
                    // Edit Button
                    let editBtn = document.createElement('td');

                    // Fill in each cell with the correspond transaction date 
                    // Date
                    let formatedDate = transaction.date.slice(0, 16);
                    date.textContent = formatedDate;
                    // Title
                    title.textContent = transaction.title;
                    // Amount
                    if (transaction.type === "income") {
                        income.textContent = transaction.amount;
                    } else {
                        expense.textContent = transaction.amount;
                    }
                    // Edit Button
                    editBtn.innerHTML = `
                        <a href="/transactions/${transaction.id}/edit" class="bg-cyan-600 text-white font-medium px-4 py-2 rounded-md mt-3">Edit</a>
                    `;

                    row.appendChild(date);
                    row.appendChild(title);
                    row.appendChild(income);
                    row.appendChild(expense);
                    row.appendChild(editBtn);

                    tbody.appendChild(row);
                }
            }

            // Sort Transactions
            function sortTransactions(transactions) {
                let changeHappend = false;
                do {
                    changeHappend = false;
                    for (let i = 0; i < transactions.length - 1; i++) {
                        let currentDate = new Date(transactions[i].date);
                        let nextDate = new Date(transactions[i + 1].date);

                        if (nextDate > currentDate) {
                            let container = transactions[i];
                            transactions[i] = transactions[i + 1];
                            transactions[i + 1] = container;
                            changeHappend = true;
                        }
                    }
                } while (changeHappend === true);
            }

            // Search for transactions
            let searchTransactions = document.getElementById('search-transactions');
            searchTransactions.addEventListener('keyup', (e) => {
                if (searchTransactions.length !== 0) {
                    let filterdTransactions = [];
                    transactions.forEach(tran => {
                        let title = tran.title.toLowerCase();
                        if (title.includes(searchTransactions.value.toLowerCase())) {
                            filterdTransactions.push(tran);
                        }
                    });
                    render(filterdTransactions);
                }
            });

            // Filter transactions by type
            let transactionsType = document.getElementById('transactions-type');
            transactionsType.addEventListener('change', (e) => {
                let choosenType = e.target.value;
                if (choosenType !== 'all') {
                    let filterdTransactions = [];
                    transactions.forEach(tran => {
                        if (tran.type === choosenType) {
                            filterdTransactions.push(tran);
                        }
                    });
                    render(filterdTransactions);
                } else {
                    render(transactions);
                }
            });

            // Filter transactions by date
            let transactionsDate = document.getElementById('transactions-date');
            transactionsDate.addEventListener('change', (e) => {
                let choosenDate = e.target.value;
                if (choosenDate !== 'all') {
                    let filterdTransactions = [];
                    let today = new Date();
                    transactions.forEach(tran => {
                        let transactionDate = new Date(tran.date);
                        let diff = Math.abs(today - transactionDate);

                        let diffDays = Math.floor(diff / (1000 * 60 * 60 * 24));
                        
                        switch (choosenDate) {
                            case 'today':
                                if (diffDays >= 0 && diffDays < 2 && transactionDate.getDay() === today.getDay()) {
                                    filterdTransactions.push(tran);
                                }
                                break;
                            case 'week':
                                if (diffDays >= 0 && diffDays <= 6) {
                                    let startWeek = startOfISOWeek(today);
                                    let endWeek = endOfISOWeek(today);
                                    if (transactionDate >= startWeek && transactionDate <= endWeek) {
                                        filterdTransactions.push(tran);
                                    }
                                }
                                break;
                            case 'month':
                                if (diffDays >= 0 && diffDays < 32 && transactionDate.getMonth() === today.getMonth() && transactionDate.getFullYear() === today.getFullYear()) {
                                    filterdTransactions.push(tran);
                                }
                                break;
                        
                            default:
                                
                                break;
                        }
                    });
                    render(filterdTransactions);
                } else {
                    render(transactions);
                }
            });
        </script>
    @endpush
</x-layouts.app>