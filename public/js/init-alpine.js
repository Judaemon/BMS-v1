document.addEventListener('alpine:init', () => {
    Alpine.data('data', () => ({
        
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },

        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },

        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },

        isGuestMenuOpen: false,
        toggleGuestMenu() {
            console.log(this.isGuestMenuOpen);
            this.isGuestMenuOpen = !this.isGuestMenuOpen
        },

        closeGuestMenu() {
            this.isGuestMenuOpen = false
        },

        closeSideMenu() {
            this.isSideMenuOpen = false
        },

        isMultiLevelMenuOpen: false,
        toggleMultiLevelMenu() {
            this.isMultiLevelMenuOpen = !this.isMultiLevelMenuOpen
        },

        isMultiLevelMenuOpenResident: true,
        toggleMultiLevelMenuResident() {
            this.isMultiLevelMenuOpenResident = !this.isMultiLevelMenuOpenResident
        }
    }))
})
