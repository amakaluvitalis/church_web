def caesar_cipher(text, shift):
    result = ""
    
    for char in text:
        if char.isalpha():  # Encrypt alphabetic characters
            shift_base = ord('A') if char.isupper() else ord('a')
            encrypted_char = chr((ord(char) - shift_base + shift) % 26 + shift_base)
            result += encrypted_char
        elif char.isdigit():
            encrypted_digit = str((int(char) + shift) % 10)
            result += encrypted_digit
        else:
            result += char
    
    return result