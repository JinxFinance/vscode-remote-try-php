#!/bin/bash

# Change to user 'username'
su - username

# Or with sudo
sudo -u username command

#!/bin/bash

# Function to get user name from prompt menu
get_username() {
    # Get a list of all users
    local users=$(cut -d: -f1 /etc/passwd)

    # Use fzf to let the user select a user
    local selected_user=$(echo "$users" | fzf)

    # Return the selected user
    echo "$selected_user"
}

# Use the function
username=$(get_username)
echo "You selected: $username"
