window.addEventListener('load', () => {
  document.querySelectorAll('.aces-search-in-list').forEach((inp) => {
    inp.addEventListener('input', function (e) {
      const searchText = e.target.value.toLowerCase()
      const selector = e.target.dataset.list

      const listItems = document.querySelectorAll(`ul${selector} li`)

      listItems.forEach(function (item) {
        var text = item.innerText.toLowerCase()

        if (text.match(new RegExp(searchText, 'gi'))) {
          item.style.display = 'list-item'
        } else {
          item.style.display = 'none'
        }
      })
    })
  })
})
