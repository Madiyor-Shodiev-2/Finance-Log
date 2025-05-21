    // Mock API endpoints (replace with actual API URLs)
    const API = {
      transactions: '/api/transactions',
      types: '/api/types'
    };

    // Mock transaction types (simulating API response)
    let transactionTypes = ['Daromad', 'Xarajat', 'Oziq-ovqat', 'Transport'];

    // Load transaction types into dropdown
    async function loadTransactionTypes() {
      try {
        // Simulate API call to fetch types
        // const response = await fetch(API.types);
        // const types = await response.json();
        const select = document.getElementById('transactionType');
        select.innerHTML = '<option value="">Tur tanlang</option>';
        transactionTypes.forEach(type => {
          const option = document.createElement('option');
          option.value = type;
          option.textContent = type;
          select.appendChild(option);
        });
      } catch (error) {
        console.error('Error loading types:', error);
      }
    }

    // Toggle new type input visibility
    document.getElementById('addNewTypeBtn').addEventListener('click', () => {
      const newTypeInput = document.getElementById('newType');
      const select = document.getElementById('transactionType');
      newTypeInput.classList.toggle('hidden');
      select.classList.toggle('hidden');
      if (!newTypeInput.classList.contains('hidden')) {
        newTypeInput.focus();
      }
    });

    // Add new transaction type
    async function addNewType(type) {
      if (type && !transactionTypes.includes(type)) {
        try {
          // Simulate API call to add type
          // await fetch(API.types, {
          //   method: 'POST',
          //   headers: { 'Content-Type': 'application/json' },
          //   body: JSON.stringify({ type })
          // });
          transactionTypes.push(type);
          await loadTransactionTypes();
          document.getElementById('newType').value = '';
          document.getElementById('newType').classList.add('hidden');
          document.getElementById('transactionType').classList.remove('hidden');
        } catch (error) {
          console.error('Error adding type:', error);
        }
      }
    }

    // Add transaction
    async function addTransaction(amount, type, isIncome) {
      try {
        const transaction = {
          amount: parseFloat(amount),
          type,
          isIncome,
          date: new Date().toISOString()
        };
        
        // Simulate API call to add transaction
        // await fetch(API.transactions, {
        //   method: 'POST',
        //   headers: { 'Content-Type': 'application/json' },
        //   body: JSON.stringify(transaction)
        // });
        
        // Display transaction
        const list = document.getElementById('transactionList');
        const li = document.createElement('li');
        li.className = `p-2 rounded-md ${isIncome ? 'bg-green-100' : 'bg-red-100'}`;
        li.textContent = `${type}: ${amount} UZS (${isIncome ? 'Kirim' : 'Chiqim'})`;
        list.prepend(li);
      } catch (error) {
        console.error('Error adding transaction:', error);
      }
    }

    // Handle form submission
    async function handleTransaction(isIncome) {
      const amount = document.getElementById('amount').value;
      const typeSelect = document.getElementById('transactionType');
      const newTypeInput = document.getElementById('newType');
      let type = typeSelect.value;

      if (!amount || (!type && newTypeInput.classList.contains('hidden'))) {
        alert('Iltimos, miqdor va tranzaksiya turini kiriting');
        return;
      }

      if (!newTypeInput.classList.contains('hidden')) {
        type = newTypeInput.value;
        await addNewType(type);
      }

      await addTransaction(amount, type, isIncome);
      document.getElementById('amount').value = '';
      typeSelect.value = '';
    }

    // Event listeners for income/expense buttons
    document.getElementById('incomeBtn').addEventListener('click', () => handleTransaction(true));
    document.getElementById('expenseBtn').addEventListener('click', () => handleTransaction(false));

    // Initialize
    loadTransactionTypes();
