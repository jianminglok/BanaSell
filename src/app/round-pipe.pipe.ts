import { Pipe, PipeTransform } from '@angular/core';

@Pipe({name: 'round'})
export class RoundPipePipe implements PipeTransform {

  transform(value: number): number {
    return Math.ceil(value);
  }

}
