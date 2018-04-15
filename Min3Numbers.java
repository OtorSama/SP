import java.util.Arrays;
import java.util.Scanner;

public class Min3Numbers {
	public static void main(String[] args) {
		Scanner scan = new Scanner(System.in);
		int n = scan.nextInt();
		int[] number = new int[n];
		
		for (int i = 0; i < n; i++) {
			numbers[i] = scan.nextInt();
		}
		Arrays.sort(numbers);

		for (int i = 0; i < Math.min(n,3); i++) {
			System.out.println(numbers[i]);
		}

	}
}